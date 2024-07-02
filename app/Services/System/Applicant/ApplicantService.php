<?php

namespace App\Services\System\Applicant;

use App\Exports\ApplicantsExport;
use App\Services\Service;
use App\Models\System\Applicant;
use App\Models\System\Vacancy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ApplicantService extends Service
{
    protected $vacancy;
    public function __construct(Applicant $model, Vacancy $vacancy)
    {
        parent::__construct($model);
        $this->vacancy = $vacancy;
    }

    public function indexPageData(Request $request)
    {
        $data = DB::select("select 'Interested Applicants' as title, 0 as id
            union 
            select title, id from vacancies");

        $vacancies = collect($data)->pluck('title', 'id')->sortKeys();
        return  [
            'items' => $this->getAllData($request),
            'vacancies' => $vacancies
        ];
    }

    public function getAllData($request)
    {
        $query = $this->query()->with('vacancy');
        if (isset($request->keyword)) {
            $query->where('name', 'ILIKE',  '%' . $request->keyword . '%');
        }

        if (isset($request->vacancy_id)) {
            $query->where('vacancy_id', $request->vacancy_id);
        }

        if (isset($request->isExport)) {
            return $query->orderBy('updated_at', 'DESC')->get();
        }

        return $query->orderBy('updated_at', 'DESC')->paginate(PAGINATE);
    }

    public function exportResume($request)
    {
        $exportData = $this->getAllData($request->merge(['isExport' => true]));

        if ($exportData->isNotEmpty()) {
            return Excel::download(new ApplicantsExport($exportData), 'resumes_' . Carbon::now() . '.xlsx');;
        } else {
            return redirect()->back()->withErrors(['msg' => "Data can't be exported because there is no any data."]);
        }
    }
}
