<?php

namespace App\Http\Controllers\System\Process;

use App\Http\Controllers\ResourceController;
use App\Services\System\Process\ProcessService;


class ProcessController extends ResourceController
{
    protected $service;

    public function __construct(ProcessService $service)
    {
        $this->service = $service;
    }

    public function storeValidationRequest()
    {
        return 'App\Http\Requests\System\ProcessRequest';
    }


    public function moduleName()
    {
        return 'processes';
    }

    public function folderName()
    {
        return 'process';
    }
}
