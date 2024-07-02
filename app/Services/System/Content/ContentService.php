<?php

namespace App\Services\System\Content;

use App\Models\System\Content;
use App\Services\Service;

class ContentService extends Service
{
    public function __construct(Content $model)
    {
        parent::__construct($model);
    }
}
