<?php

namespace App\Http\Controllers\System\Vacancy;

use App\Http\Controllers\ResourceController;
use App\Services\System\Vacancy\VacancyService;

class VacancyController extends ResourceController
{
    protected $service;

    public function __construct(VacancyService $service)
    {
        $this->service = $service;
    }

    public function moduleName()
    {
        return 'vacancies';
    }

    public function folderName()
    {
        return 'vacancy';
    }

  
}
