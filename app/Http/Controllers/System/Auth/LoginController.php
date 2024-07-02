<?php

namespace App\Http\Controllers\System\Auth;

use App\Http\Controllers\Controller;
use App\Models\System\UserPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $user, $userPassword;
    public function __construct(User $user, UserPassword $userPassword)
    {
        $this->user = $user;
        $this->userPassword = $userPassword;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
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

    public function setPasswordForm(Request $request)
    {
        $userId = $request->userId;
        return view('auth.setPassword', compact('userId'));
    }

    public function setPassword(Request $request)
    {
        $user =  $this->user->where('id', $request->id)->first();
        $password = Hash::make($request->password);
        if (!isset($user)) {
            if (!isset($user)) {
                flash()->addError('User not found.');
                return redirect()->back();
            }
        }

        //Storing Password in UserPasswords table.
        $this->userPassword->create([
            'user_id' => $request->id,
            'password' => $password
        ]);

        //Update user's password with his new password.
        $user->update([
            'password' => $password,
            'is_password_set' => true
        ]);

        return redirect()->route('login')->with('success', 'Password has been changed.');
    }

    private function validator(Request $request)
    {
        $rules = [
            'username' => 'required|max:191',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha', // Add reCAPTCHA validation
        ];

        $messages = [
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.'
        ];

        $request->validate($rules, $messages);
    }


    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['username' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect()
            ->route('login.form')
            ->with('status', 'Admin has been logged out!');
    }
}
