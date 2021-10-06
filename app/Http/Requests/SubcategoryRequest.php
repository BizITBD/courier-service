<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
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
            "name" => "required",
            "category_id" => "required",
            "image" => "required",
        ];
    }
    public function messages()
    {
        return [
            "image.mimes"   => 'image is invalid',
            "name.required" => 'name required',
            "category_id.required" => 'Please Select valid Category',
        ];
    }
}
