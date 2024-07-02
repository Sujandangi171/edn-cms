<?php

namespace App\Http\Controllers\System\Popup;

use App\Services\System\Popup\PopupService;
use App\Http\Controllers\ResourceController;


class PopupController extends ResourceController
{
    protected $service;

    public function __construct(PopupService $service)
    {
        $this->service = $service;
    }


    public function moduleName()
    {
        return 'popups';
    }

    public function folderName()
    {
        return 'popup';
    }
}
