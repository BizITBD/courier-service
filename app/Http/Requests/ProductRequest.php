<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "name"                => "required",
            "category_id"         => "required",
            "sell_price"          => "required",
            "product_details"          => "required",
            "image"               => "mimes:jpg,png",
        ];
    }
    public function messages()
    {
        return [
            "name.required" => 'Name required',
            "category_id.required" => 'Select Category',
            "sell_price.required" => 'Sell Price required',
            "product_details.required" => 'Enter Product Details',
            "image.mimes"   => 'invalid image format or blank image',
        ];
    }
}
