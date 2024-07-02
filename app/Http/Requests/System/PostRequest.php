<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:6|max:255',
            'description' => 'required|min:6',
            'status' => 'required|boolean'
        ];
    }
}
