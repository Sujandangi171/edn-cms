<?php

namespace App\Http\Controllers\System\Company;

use App\Http\Controllers\ResourceController;
use App\Services\System\Company\CompanyService;

class ClientController extends ResourceController
{
    protected $service;

    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    public function storeValidationRequest()
    {
        return 'App\Http\Requests\System\ClientRequest';
    }

    public function moduleName()
    {
        return 'clients';
    }

    public function folderName()
    {
        return 'client';
    }
}
