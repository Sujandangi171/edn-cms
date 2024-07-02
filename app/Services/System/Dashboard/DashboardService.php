<?php

namespace App\Services\System\Dashboard;

use App\Models\System\Applicant;
use App\Models\System\Category;
use App\Models\System\Enquiry;
use App\Models\System\Vacancy;
use App\Models\System\Visitor;
use App\Services\Service;
use Illuminate\Http\Request;

class DashboardService extends Service
{
    protected $applicant, $vacancy, $enquiry, $visitor;
    public function __construct(
        Category $model,
        Applicant $applicant,
        Vacancy $vacancy,
        Enquiry $enquiry,
        Visitor $visitor
    ) {
        parent::__construct($model);
        $this->applicant = $applicant;
        $this->vacancy = $vacancy;
        $this->enquiry = $enquiry;
        $this->visitor = $visitor;
    }

    public function indexPageData(Request $request)
    {
        return  [
            'applications' => $this->applicant->count(),
            'vacancies' => $this->vacancy->count(),
            'vacancies' => $this->vacancy->count(),
            'enquires' => $this->enquiry->count(),
            'visitors' => $this->visitor->count(),

        ];
    }
}
