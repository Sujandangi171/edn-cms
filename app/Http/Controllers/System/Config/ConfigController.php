<?php

namespace App\Http\Controllers\System\Config;

use App\Http\Controllers\ResourceController;
use App\Models\System\Config;
use App\Services\System\Config\ConfigService;
use Illuminate\Http\Request;

class ConfigController extends ResourceController
{
    protected $service;

    public function __construct(ConfigService $service)
    {
        $this->service = $service;
    }

    public function moduleName()
    {
        return 'configs';
    }

    public function folderName()
    {
        return 'config';
    }
}
