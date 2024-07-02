<?php

namespace App\Http\Requests\System;

use App\Models\System\Genre;
use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|min:6|max:255',

        ];

        $genres = Genre::pluck('title');
        return view('your.view', ['authors' => $genres]);
    }
}
