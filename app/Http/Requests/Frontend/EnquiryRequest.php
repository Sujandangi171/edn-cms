<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EnquiryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|regex:/^[^@]+@[^@]+\.com$/',
            'subject' => 'required',
            'message' => 'required',
            'contact' => 'required|digits:10|integer|regex:/^9[78]\d{8}$/',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.',
            'g-recaptcha-response.captcha' => 'Invalid Captcha.',
            'email' => 'Invalid email format.',
            'contact' => 'Invalid contact format'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect(env('APP_URL') . '#contacts')->withErrors($validator)->withInput()
        );
    }
}
