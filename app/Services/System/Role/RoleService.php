<?php

namespace App\Services\System\role;

use App\Exceptions\CustomExceptionHandler;
use App\Models\System\Module;
use App\Models\System\Role;
use App\Services\Service;

class RoleService extends Service
{
    protected $module;
    public function __construct(Role $config, Module $module)
    {
        parent::__construct($config);
        $this->module = $module;
    }

    public function getAllData($request)
    {
        $query = $this->query();
        if (isset($request->keyword)) {
            $query->where('title', 'ILIKE',  '%' . $request->keyword . '%');
        }
        return $query->orderBy('updated_at', 'DESC')->paginate(paginate());
    }

    public function createPageData($request)
    {
        return [
            'modules' => $this->module->get()
        ];
    }

    public function editPageData($id)
    {
        $roleData = $this->getItemById($id);
        return [
            'item' => $roleData,
            'modules' => $this->module->get(),
            'permissions' => $roleData->permissions()->pluck('permission_id')->toArray(),
            'status' => $this->status()
        ];
    }

    public function store($request)
    {
        $role = $this->model->create($request->except('_token'));
        $role->permissions()->sync($request->permission_id);
    }

    public function update($request, $id)
    {
        $data = $request->except('_token');
        $update = $this->getItemById($id);
        $update->permissions()->sync($request->permission_id);
        $update->update($data);
    }

    public function getRoleIdBySlug($slug)
    {
        return $this->model->where('slug', $slug)->value('id');
    }

    public function delete($id)
    {
        $data = $this->getItemById($id);

        if ($data->slug === 'super_admin') {
            throw new CustomExceptionHandler('test');
        }
        $data->delete();
    }
}
