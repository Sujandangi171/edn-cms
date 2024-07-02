<?php

namespace App\Services\System\Config;

use App\Http\Traits\FileTrait;
use App\Models\System\Config;
use App\Services\Service;

class ConfigService extends Service
{
    use FileTrait;
    public function __construct(Config $model)
    {
        parent::__construct($model);
    }

    public function getAllData($request)
    {
        $query = $this->query();
        if (isset($request->keyword)) {
            $query->where('label', 'ILIKE',  '%' . $request->keyword . '%');
        }
        return $query->orderBy('updated_at', 'DESC')->paginate(PAGINATE);
    }

    public function store($request)
    {
        $data = $request->except('_token');
        if ($request->type === 'file') {
            $file = $request->file('value');
            $imageName = time() . '.' . $file->extension();
            $file->move(public_path('uploads/config'), $imageName);
            $data['value'] = $imageName;
        }
        $this->model->create($data);
    }

    public function update($request, $id)
    {
        $data = $request->except('_token');
        if ($request->file('value')) {
            $file = $request->file('value');
            $imageName = time() . '.' . $file->extension();
            $file->move(public_path('uploads/config'), $imageName);
            $data['value'] = $imageName;
        }
        $data['updated_by'] = authUser()->id;
        $update = $this->getItemById($id);
        $update->update($data);
    }
}
