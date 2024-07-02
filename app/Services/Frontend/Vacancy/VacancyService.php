<?php

namespace App\Services\Frontend\Vacancy;

use Carbon\Carbon;
use App\Services\Service;
use App\Http\Traits\FileTrait;
use App\Models\System\Vacancy;
use App\Models\System\Applicant;
use Illuminate\Support\Facades\DB;
use App\Events\VacancyEvent;
use Exception;

class VacancyService extends Service
{
    use FileTrait;
    protected $applicant;
    public function __construct(Vacancy $model, Applicant $applicant)
    {
        parent::__construct($model);
        $this->applicant = $applicant;
    }

    public function getVacancies($request)
    {
        $currentDate = now();

        if ($request->vacancy_type) {
            $vacancies = $this->model
                ->rank()
                ->active()
                ->where('vacancy_type_id', $request->vacancy_type)
                ->whereDate('due_date', '>=', $currentDate)
                ->paginate(5);
        } else {
            $vacancies = $this->model
                ->rank()
                ->active()
                ->whereDate('due_date', '>=', $currentDate)
                ->paginate(5);
        }


        foreach ($vacancies as $vacancy) {
            $vacancy->remainingDays = $this->calculateRemainingDays($vacancy->due_date);
        }
        return $vacancies;
    }

    public function getVacancyDetailBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function applyVacancy($request)
    {

        try {
            DB::transaction(function () use ($request) {

                $data = $request->except('_token');
                $data['other_university_title'] = $request->university_id == 0 ? $request->other_university_title : null;
                $data['university_id'] = isset($request->other_university_title) ? null : $request->university_id;
                $data['name'] = $request->first_name . ' ' . $request->middle_name . ' ' . $request->middle_name;
                $data['country'] = 'Nepal';


                $applicant = $this->applicant->create($data);
                //Send a notification to us.
                event(new VacancyEvent($applicant));
                $this->uploadResume($request->resume, 'uploads/resumes', $applicant);
            });
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function calculateRemainingDays($due_Date)
    {

        $due_Date = Carbon::parse($due_Date);
        $currentDate = Carbon::now();

        return $currentDate->diffInDays($due_Date);
    }

    public function getVacancyById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getOtherVacancies($slug, $limit)
    {
        $currentVacancy = Vacancy::where('slug', $slug)->first();

        // Ensure the current vacancy exists before attempting to calculate remaining days
        if ($currentVacancy) {
            $currentVacancy->remainingDays = $this->calculateRemainingDays($currentVacancy->due_date);
        }

        return Vacancy::where('slug', '!=', $slug)
            ->orderBy('created_at', 'desc')
            ->whereDate('due_date', '>=', Carbon::today())
            ->limit($limit)
            ->get()
            ->map(function ($vacancy) {
                $vacancy->remainingDays = $this->calculateRemainingDays($vacancy->due_date);
                return $vacancy;
            });
    }
}
