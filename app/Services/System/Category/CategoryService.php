<?php

namespace App\Services\System\Category;

use App\Models\System\Category;
use App\Services\Service;

class CategoryService extends Service
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function store($request)
    {
        $data = $request->except('_token');
        $data['title'] = [
            'en' => $request->english,
            'np' => $request->local
        ];
        $data['created_by'] = authUser()->id;
        $this->model->create($data);
    }

    public function update($request, $id)
    {
        $data = $request->except('_token');
        $data['updated_by'] = authUser()->id;
        $data['title'] = [
            'en' => $request->english,
            'np' => $request->local
        ];
        $update = $this->getItemById($id);
        $update->update($data);
    }
}
