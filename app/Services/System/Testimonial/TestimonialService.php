<?php

namespace App\Services\System\Testimonial;

use App\Http\Traits\FileTrait;
use App\Models\System\Testimonial;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class TestimonialService extends Service
{
    use FileTrait;
    public function __construct(Testimonial $model)
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
            $testimonial = $this->model->create($data);
            if ($request->file('image')) {
                $this->storeImage($request->image, 'uploads/testimonials', $testimonial); //Image,Storage.Model
            }
        });
    }

    public function update($request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $data = $request->except('_token');
            $data['updated_by'] = authUser()->id;
            $update = $this->getItemById($id);

            if ($request->file('image')) {
                $this->updateImage($request->image, 'uploads/testimonials', $update); //Image,Storage.Model
            }
            $update->update($data);
        });
    }
}
