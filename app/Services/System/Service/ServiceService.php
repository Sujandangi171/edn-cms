<?php

namespace App\Services\System\Service;

use App\Models\System\Service as SystemService;
use App\Services\Service;

class ServiceService extends Service
{
    public function __construct(SystemService $model)
    {
        parent::__construct($model);
    }

    public function getAllData($request)
    {
        $query = $this->query()->rank();
        if (isset($request->keyword)) {
            $query->where('title', 'ILIKE',  '%' . $request->keyword . '%');
        }
        return $query->orderBy('updated_at', 'DESC')->paginate(PAGINATE);
    }

    public function store($request)
    {
        $data = $request->except('_token');
        $data['created_by'] = authUser()->id;
        $this->model->create($data);
    }
}
