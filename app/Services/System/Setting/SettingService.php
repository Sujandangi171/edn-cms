<?php

namespace App\Services\System\Setting;

use App\Http\Traits\FileTrait;
use App\Models\System\Setting;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingService extends Service
{
    use FileTrait;

    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $data = $request->except('_token');

     


            foreach ($data as $key => $value) {
                if ($request->hasFile($key)) {
                    $image = $request->file($key);
                    $imageName = time() . '.' . $image->extension();
                    $image->move(public_path('uploads/site-configs'), $imageName);
                    $value = $imageName;
                }

                $this->model->create(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
        });
    }



    public function indexPageData(Request $request)
    {
        return  [
            'items' => $this->model->pluck('value', 'key'),
        ];
    }
}
