<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_np'=>'required',
            'title_eng'=>'required',
        ];
    }
}
