<?php

namespace App\Services\System\EmailTemplate;

use App\Models\System\EmailTemplate;
use App\Services\Service;

class EmailTemplateService extends Service
{
    public function __construct(EmailTemplate $model)
    {
        parent::__construct($model);
    }


}
