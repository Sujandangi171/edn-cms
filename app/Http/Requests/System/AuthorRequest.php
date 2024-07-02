<?php

namespace App\Http\Requests\System;

use App\Models\System\Author;
use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // dd(request()->all());
        return [
            'name' => 'required|min:6|max:255',
            'address' => 'required|min:6|max:255',
            'email' => 'required|min:6|max:255|unique:authors,email',
            'dob' => 'required|min:6',
            'bio' => 'required|max:255',
        ];

        $authors = Author::pluck('full_name', 'id');
        return view('your.view', ['authors' => $authors]);
    }
}
