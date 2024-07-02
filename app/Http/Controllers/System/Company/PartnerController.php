<?php

namespace App\Http\Controllers\System\Company;

use App\Http\Controllers\ResourceController;
use App\Services\System\Company\CompanyService;

class PartnerController extends ResourceController
{
    protected $service;

    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    // public function storeValidationRequest()
    // {
    //     return 'App\Http\Requests\System\CategoryRequest';
    // }

    
    public function storeValidationRequest()
    {
        return 'App\Http\Requests\System\PartnerRequest';
    }

    public function moduleName()
    {
        return 'partners';
    }

    public function folderName()
    {
        return 'partner';
    }
}
