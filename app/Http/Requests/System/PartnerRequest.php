<?php

namespace App\Http\Requests\System;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:2|max:255',
            'link' => 'nullable|url|unique:companies,link',
            'rank' => 'nullable|integer',
            'description' => 'required|min:2|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|boolean',
        ];
    }
}
