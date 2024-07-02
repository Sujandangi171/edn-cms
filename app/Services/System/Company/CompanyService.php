<?php

namespace App\Services\System\Company;

use App\Http\Traits\FileTrait;
use App\Models\System\Company;
use App\Services\Service;
use Illuminate\Support\Facades\DB;

class CompanyService extends Service
{
    use FileTrait;

    protected $filePath;

    public function __construct(Company $model)
    {
        parent::__construct($model);
        $this->filePath = 'uploads/business';
    }

    public function getAllData($request)
    {
        $companyType = request()->segment(2);

        $query = $this->query()->rank();
        if (isset($request->keyword)) {
            $query->where('title', 'ILIKE',  '%' . $request->keyword . '%');
        }

        if ($companyType === 'clients') {
            $query->where('company_type', 'client');
        } else {
            $query->where('company_type', 'partner');
        }
        return $query->orderBy('updated_at', 'DESC')->paginate(PAGINATE);
    }

    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $data = $request->except('_token');
            $data['created_by'] = authUser()->id;
            $company = $this->model->create($data);
            //Store Image
            if ($request->file('image')) {
                $this->storeImage($request->image, 'uploads/business', $company); //Image,Storage.Model
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
                $this->updateImage($request->image, 'uploads/business', $update); //Image,Storage.Model
            }
            $update->update($data);
        });
    }

    public function delete($id)
    {
        DB::transaction(function () use ($id) {
            $data = $this->getItemById($id);
            $this->deleteFile($this->filePath, $data);
            $data->delete();
        });
    }
}
