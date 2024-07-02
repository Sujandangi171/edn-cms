<?php

namespace App\Services\System\User;

use App\Events\SetPasswordEvent;
use App\Models\User;
use App\Services\Service;
use App\Models\System\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService extends Service
{
    protected $role;

    public function __construct(User $model, Role $role)
    {
        parent::__construct($model);
        $this->role = $role;
    }

    public function getAllData($request)
    {
        $query = $this->query();
        if (isset($request->role_id)) {
            $query->where('role_id',  $request->role_id);
        }
        return $query->orderBy('updated_at', 'DESC')->paginate(PAGINATE);
    }

    public function indexPageData(Request $request)
    {
        return  [
            'items' => $this->getAllData($request),
            'roles' => Role::pluck('name', 'id'),
        ];
    }

    public function createPageData($request)
    {
        return [
            'status' => $this->status(),
            'roles' => $this->role->pluck('name', 'id')
        ];
    }

    public function editPageData($id)
    {
        return [
            'item' => $this->getItemById($id),
            'status' => $this->status(),
            'roles' => $this->role->pluck('name', 'id')
        ];
    }

    public function store($request)
    {
        DB::transaction(function () use ($request) {
            try {
                $data = $request->except('_token');
                $password = generatePassword(6);
                $data['token'] = generateToken(10);
                $data['password'] = Hash::make($password);
                $user = $this->model->create($data);
                $this->sendPasswordLink($user, $password);
                // event(new SetPasswordEvent($user, $password));
            } catch (\Exception $e) {
                $request->flash();
                dd($e->getMessage());
                // throw new CustomExceptionHandler($e->getMessage());
            }
        });
    }

    public function resendPassword($userId)
    {
        $user = $this->model->where('id', $userId)->first();
        $password = generatePassword(6);

        if ($user) {
            $user->update([
                'password' => Hash::make($password)
            ]);
            $this->sendPasswordLink($user, $password);
        }
    }

    public function sendPasswordLink($user, $password)
    {
        event(new SetPasswordEvent($user, $password));
    }
}
