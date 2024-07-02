<?php

namespace App\Http\Middleware;

use App\Models\System\Role;
use Closure;
use Illuminate\Http\Request;

class CheckRoleAndPermission
{

    protected $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function handle(Request $request, Closure $next)
    {
        $seg2 = request()->segment(2);
        $seg3 = request()->segment(3);
        $seg4 = request()->segment(4);

        if (isset($seg2) && !isset($seg3) && !isset($seg4)) {
            $url = $seg2;
        } else if (isset($seg2) && isset($seg3) && !isset($seg4)) {
            $url = $seg2 . '/' . $seg3;
        } else if (isset($seg2) && isset($seg3) && isset($seg4)) {
            $url = $seg2 . '/' . '*' . '/' . $seg4;
        }

        if (request()->segment(3) === 'create') {
            $method = 'POST';
        } else if (request()->segment(4) === 'edit') {
            $method = 'PUT';
        } else {
            $method = $request->method();
        }

        $roleId = authUser()->role_id;
        if ($roleId != 1) {
            $role = $this->role->find($roleId);
            $access = false;
            //Don't check for storing and updating.
            if ($seg3 != 'create' && $method === 'POST' || $seg4 != 'edit'  && $method === 'PUT' || $url && $method === 'DELETE') {
                return $next($request);
            }

            foreach ($role->permissions as $permission) {
                if ($permission->url == $url && $permission->method == $method) {
                    return $next($request);
                }
            }

            if ($access == false) {
                return response()->view('system.errors.403');
            }
        }

        return $next($request);
    }
}
