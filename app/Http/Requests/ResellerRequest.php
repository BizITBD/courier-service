<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResellerRequest extends FormRequest
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
            "name"               => "required",
            "phone"              => "required",
            "email"              => "required",
            "password"           => "required",

            "company_name"       => "required",
            "fb_page_link"       => "required",
            // "interest"           => "required",


            // "status"             => "required",
            // "address"            => "required",
            // "image"              => "mimes:jpg,png",
        ];
    }
    public function messages()
    {
        return [
            "name.required"     => 'Name required',
            "phone.required"    => 'Phone Number required',
            "email.required"    => 'Invalid email Address',
            "password.required" => 'Invalid password,please try again',

            "company_name.required" => 'Please Insert Company Name.',
            "fb_page_link.required" => 'Please Insert Facebook Page Link.',
            // "interest.required"     => 'Please Insert Your Interest.',

            // "status.required"   => 'Status required',
            // "address.required"  => 'Address required',
            // "image.mimes"       => 'Invalid image format or blank image',
        ];
    }
}
