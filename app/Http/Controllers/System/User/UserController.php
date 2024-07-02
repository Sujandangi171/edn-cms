<?php

namespace App\Http\Controllers\System\User;

use App\Http\Controllers\ResourceController;
use App\Services\System\User\UserService;

class UserController extends ResourceController
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    // public function storeValidationRequest()
    // {
    //     return 'App\Http\Requests\System\UserRequest';
    // }

    public function moduleName()
    {
        return 'users';
    }

    public function folderName()
    {
        return 'user';
    }

    public function resendPassword($id)
    {
        $this->service->resendPassword($id);
        return redirect()->back()->with('success', 'Email has been sent.');
    }

    public function profile()
    {
        return view('system.profile.show');
    }
}
