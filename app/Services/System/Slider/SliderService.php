<?php

namespace App\Services\System\Slider;

use App\Http\Traits\FileTrait;
use App\Models\System\Slider;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class SliderService extends Service
{
    use FileTrait;
    public function __construct(Slider $model)
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
        DB::transaction(function () use ($request) {
            $data = $request->except('_token');
            $slider = $this->model->create($data);
            //Store Image
            if ($request->image) {
                $this->storeImage($request->image, 'uploads/sliders', $slider);
            }
        });
    }

    public function update($request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $data = $request->except('_token');
            $data['updated_by'] = authUser()->id;
            $update = $this->getItemById($id);
            //Update Image
            if ($request->image) {
                $this->updateImage($request->image, 'uploads/sliders', $update);
            }
            $update->update($data);
        });
    }
}
