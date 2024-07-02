<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|min:6|max:255',
            'status' => 'required|boolean',
        ];

        if (request()->method() == 'get') {
            $rules = array_merge($rules, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
        }

        return $rules;
    }
}
