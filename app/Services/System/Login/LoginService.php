<?php



namespace App\Services\System\Login;

use App\Models\User;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginService extends Service
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function login($request)
    {
        $this->validator($request);
        if (Auth::guard('web')->attempt($request->only('username', 'password'), $request->remember)) {
            if (!Auth::user()->is_password_set) {
                $userId = Auth::user()->id;
                Auth::logout();
                return redirect()->route('login.setPasswordForm', ['userId' => $userId]);
            }
            return redirect()->route('home.index');
        }
        return $this->loginFailed();
    }

    private function validator(Request $request)
    {
        $rules = [
            'username' => 'required|max:191',
            'password' => 'required'
        ];
        $request->validate($rules);
    }

    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['username' => 'These credentials do not match our records.']);
    }
}
