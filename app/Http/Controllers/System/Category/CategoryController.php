<?php

namespace App\Http\Controllers\System\Category;

use App\Http\Controllers\ResourceController;
use App\Services\System\Category\CategoryService;

class CategoryController extends ResourceController
{
    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function storeValidationRequest()
    {
        return 'App\Http\Requests\System\CategoryRequest';
    }

    public function moduleName()
    {
        return 'categories';
    }

    public function folderName()
    {
        return 'category';
    }

}
