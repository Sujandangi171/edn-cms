<?php

namespace App\Services\System\Popup;

use App\Http\Traits\FileTrait;
use App\Models\System\Popup;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class PopupService extends Service
{
    use FileTrait;
    public function __construct(Popup $model)
    {
        parent::__construct($model);
    }

    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $data = $request->except('_token');
            $popup = $this->model->create($data);
            if ($request->file('image')) {
                $this->storeImage($request->image, 'uploads/popups', $popup); //Image,Storage.Model
            }
        });
    }
}
