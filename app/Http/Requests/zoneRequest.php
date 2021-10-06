<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class zoneRequest extends FormRequest
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
            "zone_name"     => "required",
            "city_id"       => "required",
        ];
    }
    public function messages()
    {
        return [
            "zone_name.required" => 'Zone Name required',
            "cityid.required" => 'City Name required',
        ];
    }
}
