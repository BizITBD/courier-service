<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryCityRequest extends FormRequest
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
            "city_name"     => "required",
            "delivery_fee"  => "required",
        ];
    }
    public function messages()
    {
        return [
            "city_name.required" => 'City Name required',
            "delivery_fee.required" => 'Delivery Fee required',
        ];
    }
}
