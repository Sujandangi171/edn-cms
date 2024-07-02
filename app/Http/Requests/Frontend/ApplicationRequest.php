<?php

namespace App\Http\Requests\Frontend;

use App\Rules\AgeVerification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ApplicationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'university_id' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'municipality_id' => 'required',
            'phone_number' => 'required|string|min:10|unique:applicants,phone_number|regex:/^9[78]\d{8}$/',
            'course' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:applicants,email|regex:/^[^@]+@[^@]+\.com$/',
            'github_url' => 'nullable|url|max:255|unique:applicants,github_url',
            'linkedin_url' => 'nullable|url|max:255|unique:applicants,linkedin_url',
            'dob' => ['required', 'date', new AgeVerification($request->dob)],
            'resume' => 'required|mimes:pdf|max:2048',
            'heard_about_us' => 'required',
            'g-recaptcha-response' => 'required|captcha',
            'other_university_title' => 'nullable|string|min:5',
            'is_agreed' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.',
            'is_agreed.required' => 'You must agree to the terms and conditions.'
        ];
    }
}
