<?php

namespace App\Services\System\Process;

use App\Models\System\Process;
use App\Services\Service;

class ProcessService extends Service
{
    public function __construct(Process $model)
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
}
