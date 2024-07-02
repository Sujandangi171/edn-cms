<?php

namespace App\Http\Controllers\Frontend\Vacancy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Frontend\Vacancy\VacancyService;
use App\Http\Requests\Frontend\ApplicationRequest;
use App\Models\System\State;
use App\Models\System\University;
use Illuminate\Support\Facades\DB;

class VacancyController extends Controller
{
    protected $service, $university, $state;

    public function __construct(VacancyService $service, University $university, State $state)
    {
        $this->service = $service;
        $this->university = $university;
        $this->state = $state;
    }

    public function index(Request $request)
    {
        $vacancies = $this->service->getVacancies($request);
        return view('frontend.vacancies.index', compact('vacancies'));
    }

    public function show($slug)
    {
        $vacancy = $this->service->getVacancyDetailBySlug($slug);
        $vacancy->remainingDays = $this->service->calculateRemainingDays($vacancy->due_date);
        return view('frontend.vacancies.show', compact('vacancy'));
    }

    public function applyVacancyForm($slug)
    {
        $vacancy = $this->service->getVacancyDetailBySlug($slug);
        $vacancy->remainingDays = $this->service->calculateRemainingDays($vacancy->due_date);
        $universities = DB::select("SELECT title, id, rank FROM universities WHERE status = true
        UNION 
        SELECT 'Others' AS title, 0 AS id, 100 AS rank
        ORDER BY rank ASC");

        $finalUnis = collect($universities)->pluck('title', 'id');

        $data = [
            'vacancy' => $vacancy,
            'universities' =>  $finalUnis,
            'provinces' => $this->state
                ->where('type', 'admin1')
                ->orderBy('id', 'DESC')
                ->pluck('name', 'code')
        ];

        return view('frontend.vacancies.apply', $data);
    }

    public function applyVacancy(ApplicationRequest $request)
    {

        $this->service->applyVacancy($request);
        flash()->options([
            'timeout' => 5000
        ])->addSuccess('Congratulations, You have successfully applied.');
        return redirect()->back();
    }

    public function showVacancy($id)
    {
        $vacancy = $this->service->getVacancyById($id);
        $vacancy->remainingDays = $this->service->calculateRemainingDays($vacancy->due_date);
        return view('frontend.vacancies.header', compact('vacancy'));
    }

    public function interestedApplicant($id)
    {
        $universities = DB::select("SELECT title, id, rank FROM universities WHERE status = true
        UNION 
        SELECT 'Others' AS title, 0 AS id, 100 AS rank
        ORDER BY rank ASC");

        $finalUnis = collect($universities)->pluck('title', 'id');

        $data = [
            'universities' =>  $finalUnis,
            'provinces' => $this->state
                ->where('type', 'admin1')
                ->orderBy('id', 'DESC')
                ->pluck('name', 'code')
        ];
        return view('frontend.vacancies.apply', $data);
    }
}
