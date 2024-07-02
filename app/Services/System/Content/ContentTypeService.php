<?php

namespace App\Services\System\Content;

use App\Models\System\ContentType;
use App\Services\Service;

class ContentTypeService extends Service
{
    public function __construct(ContentType $model)
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
