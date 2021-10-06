<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required",
            'phone' => "required",
            'company_name' => "required",
            'email' => "required|email|unique:resellers,email",
            // 'interest' => "required",
            'password' => "required",
        ];
    }
    public function messages()
    {
        return [
            "name.required" => 'Name cant be empty',
            "phone.required" => 'Please Enter Your Valid Phone Number',
            "company_name.required" => 'Please Enter Your Company Name',
            "email.required" => 'Please Enter Email Address',
            // "interest.required" => 'Please Select Your Interests from checkbox below',
            "password.required" => 'Please Enter Valid Password',
        ];
    }
}
