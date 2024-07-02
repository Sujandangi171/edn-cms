<?php

namespace App\Services\Frontend\Enquiry;


use App\Models\System\Enquiry;
use App\Services\Service;

class EnquiryService extends Service
{
    public function __construct(Enquiry $model)
    {
        parent::__construct($model);
    }

    public function storeData($data)
    {
        return $this->model->create($data);
    }
}
