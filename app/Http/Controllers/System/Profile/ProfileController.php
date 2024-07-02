<?php

namespace App\Http\Controllers\System\Profile;

use App\Events\ResetPasswordEvent;
use App\Http\Controllers\Controller;
use App\Models\System\UserPassword;
use App\Models\User;
use App\Services\System\role\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    protected $roleService, $staff, $user, $userPasswords;
    public function __construct(RoleService $roleService, UserPassword $userPassword, User $user)
    {
        $this->roleService = $roleService;
        $this->userPasswords = $userPassword;
        $this->user = $user;
    }
    public function viewProfile()
    {
        $data = [
            'item' => $this->getUserDetail()
        ];
        $data['indexUrl'] = 'Test';
        $data['moduleName'] = 'Profile';
        $data['breadCrumb'] =  $this->breadCrumbForIndex();
        return view('system.profile.show', $data);
    }

    public function getUserDetail()
    {
        return User::where('id', authUser()->id)->first();
    }

    public function breadCrumbForIndex()
    {
        $breadCrumb = [
            $this->baseBreadCrumb(), [
                'title' => 'Profile',
            ]
        ];
        return $breadCrumb;
    }

    public function breadCrumbForForm()
    {
        $breadCrumb = [
            $this->baseBreadCrumb(), [
                'title' => 'Profile',
                'link' => 'my-profile',
                'active' => true
            ],
            [
                'title' => 'Update',
                'link' => 'Test',
            ]
        ];
        return $breadCrumb;
    }

    public function breadCrumbForPassword()
    {
        $breadCrumb = [
            $this->baseBreadCrumb(), [
                'title' => 'Profile',
                'link' => 'my-profile',
                'active' => true
            ],
            [
                'title' => 'Password',
            ]
        ];
        return $breadCrumb;
    }

    public function baseBreadCrumb()
    {
        return [
            'title' => 'Dashboard',
            'link' =>  'home.index',
            'active' => true
        ];
    }

    public function updateProfileForm()
    {
        $data = [
            'item' => $this->getUserDetail()
        ];
        $data['indexUrl'] = 'Test';
        $data['moduleName'] = 'Profile';
        $data['breadCrumb'] =  $this->breadCrumbForForm();

        $data['gender'] = [
            ['value' => 1, 'label' => 'Male'],
            ['value' => 0, 'label' => 'Female'],
        ];

        return view('system.profile.profile-form', $data);
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'email' => 'unique:users,email',
            'contact_number' => 'min:0|max:10',
        ];
        $request->validate($rules);
        $user = $this->getUserDetail();
        $data = $request->except('_token', 'password', 'role_id', 'status');
        $user->update($data);
        return redirect()->route('my-profile')->with(['success' => 'Profile has been updated']);
    }

    public function updatePasswordForm()
    {
        $data['moduleName'] = 'Profile';
        $data['breadCrumb'] =  $this->breadCrumbForPassword();

        $data['gender'] = [
            ['value' => 1, 'label' => 'Male'],
            ['value' => 0, 'label' => 'Female'],
        ];

        return view('system.profile.password', $data);
    }

    public function updatePassword(Request $request)
    {
        $response = $this->setResetPassword($request);




        if ($response['check']) {
            $msg = ['success' => $response['msg']];
        } else {
            $msg = ['msg' => $response['msg']];
        }
        return redirect()->back()->withErrors($msg);
    }

    public function setResetPassword($request)
    {
        try {
            $user = $this->user->where('id', authUser()->id)->first();
            //Check if user has entered current password as recent password.
            $result = $this->checkOldPasswords($user, $request);
            //If user enters new password password is new.
            if ($result['check']) {
                $password = Hash::make($request->password);
                if ($user->userPasswords->count() < 3) {
                    dd('create new');

                    $user->userPasswords()->create(['password' => $password]);
                } else {
                    //Remove first password and set a new password.
                    $this->userPasswords->where('user_id', $user->id)->orderBy('created_at', 'ASC')->first()->delete();
                    $user->userPasswords()->create(['password' => $password]);
                }
                $user->update([
                    'password' => $password,
                ]);
                return [
                    'check' => true,
                    'msg' => "Password has been changed successfully."
                ];
            }
            return $result;
        } catch (\Exception $e) {
            dd($e);
            // throw new CustomGenericException($e->getMessage());
        }
    }

    public function  checkOldPasswords($user, $request)
    {
        $oldPasswordMatched = $this->checkIfPasswordIsCorrect($user, $request);
        if ($oldPasswordMatched) {
            $oldPasswords = $user->userPasswords()->get();

            $check = true;
            foreach ($oldPasswords as $oldPassword) {
                if (Hash::check($request->password, $oldPassword->password)) {
                    $check = false;
                    break;
                }
            }
            return [
                'check' => $check,
                'msg' => $check ? "All good" : "You have already used this password, please enter the new password."
            ];
        } else {
            return [
                'check' => false,
                'msg' => "Entered password didn't match with your current password."
            ];
        }
    }

    public function checkIfPasswordIsCorrect($user, $request)
    {
        if (Hash::check($request->current_password, $user->password)) {
            return true;
        } else {
            return false;
        }
    }




    public function forgotPasswordForm()
    {
        return view('system.profile.forgot-password-form');
    }

    public function forgotPassword(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $token = generateToken(10);
            $user = $this->user->where('email', $request->email)->first();

            if (isset($user)) {
                $user->update([
                    'token' => $token,
                    'is_token_expired' => false
                ]);
                event(new ResetPasswordEvent($user, $token));
            } else {
                return redirect()->back()->withErrors(['email' => "Email doesn't exist in our system."])->withInput();
            }

            return redirect()->back()->with(['success' => 'A reset link has been sent to your email.']);
        });
    }

    public function resetPasswordForm(Request $request, $token)
    {
        $user = $this->getUserByToken($token);


        if (isset($user) && $user->is_token_expired != true) {
            return view('system.profile.reset-password', ['token' => $token]);
        }
        return view('system.errors.404');
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = $this->user->where('token', $request->token)->first() ?? $this->staff->where('token', $request->token)->first();

        $user->update([
            'password' => Hash::make($request->password),
            'is_token_expired' => true
        ]);

        return redirect()->route('login')->with(['success' => 'Password has been successfully changed']);
    }

    public function getUserByToken($token)
    {
        return  $this->user->where('token', $token)->first() ?? null;
    }
}
