<?php

namespace App\Http\Controllers\System\Permission;

use App\Http\Controllers\ResourceController;
use App\Services\System\Permission\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends ResourceController
{
    protected $service;

    public function __construct(PermissionService $service)
    {
        $this->service = $service;
    }

    public function moduleName()
    {
        return 'permissions';
    }

    public function folderName()
    {
        return 'permission';
    }

    public function store()
    {
        if (!empty($this->storeValidationRequest())) {
            $request = $this->storeValidationRequest();
        } else {
            $request = $this->defaultRequest();
        }
        $request = app()->make($request);
        $this->service->store($request);
        $this->toastMessage('create');
        return redirect('/system/permissions?moduleId=' . $request->module_id);
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        $this->toastMessage('delete');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->service->update($request, $id);
        $this->toastMessage('update');
        return redirect('/system/permissions?moduleId=' . $request->module_id);
    }
}
