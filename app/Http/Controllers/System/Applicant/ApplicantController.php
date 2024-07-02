<?php

namespace App\Http\Controllers\System\Applicant;

use App\Http\Controllers\ResourceController;
use App\Services\System\Applicant\ApplicantService;
use Illuminate\Http\Request;

class ApplicantController extends ResourceController
{
    protected $service;

    public function __construct(ApplicantService $service)
    {
        $this->service = $service;
    }

    public function moduleName()
    {
        return 'applicants';
    }

    public function folderName()
    {
        return 'applicant';
    }

    public function exportResume(Request $request)
    {
        return $this->service->exportResume($request);
    }
}
