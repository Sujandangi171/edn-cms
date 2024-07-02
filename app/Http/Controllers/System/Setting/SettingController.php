<?php

namespace App\Http\Controllers\System\Setting;

use App\Http\Controllers\ResourceController;
use App\Services\System\Setting\SettingService;

class SettingController extends ResourceController
{
    protected $service;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
    }


    public function moduleName()
    {
        return 'settings';
    }

    public function folderName()
    {
        return 'setting';
    }
}
