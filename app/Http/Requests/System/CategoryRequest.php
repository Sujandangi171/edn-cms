<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'english' => 'required',
            'local' => 'required',
        ];
    }
}
