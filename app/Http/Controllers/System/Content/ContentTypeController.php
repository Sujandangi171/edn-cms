<?php

namespace App\Http\Controllers\System\Content;

use App\Http\Controllers\ResourceController;
use App\Services\System\Content\ContentTypeService;

class ContentTypeController extends ResourceController
{
    public function __construct(ContentTypeService $service)
    {
        $this->service = $service;
    }

    public function moduleName()
    {
        return 'content-types';
    }

    public function folderName()
    {
        return 'content-type';
    }
}
