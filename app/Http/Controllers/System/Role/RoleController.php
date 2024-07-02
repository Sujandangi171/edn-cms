<?php

namespace App\Http\Controllers\System\Role;

use App\Http\Controllers\ResourceController;
use App\Services\System\Role\RoleService;
use Illuminate\Http\Request;

class RoleController extends ResourceController
{
    protected $service;

    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    public function moduleName()
    {
        return 'roles';
    }

    public function folderName()
    {
        return 'role';
    }


    public function update(Request $request, $id)
    {
        $this->service->update($request, $id);
        $this->toastMessage('update');
        return redirect()->back();
    }
}
