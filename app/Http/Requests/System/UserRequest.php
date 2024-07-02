<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $validate  = [
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],

        ];

        if (request()->method() === 'POST') { {
                $validate = array_merge($validate, [
                    'password' => ['required'],
                    'confirm_password' => ['required', 'same:password'],
                    'username' => ['required', 'unique:users'],
                ]);
            }
        }
        if (request()->method() === 'PUT') { {
                $validate = array_merge($validate, [
                    'username' => ['required'],
                ]);
            }
        }

        return $validate;
    }
}
