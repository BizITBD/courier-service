<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            "store"                 => "required",
            "product_type"          => "required",
            "order_id"              => "required",
            "recipient_name"        => "required",
            "recipient_phone"       => "required",
            "recipient_address"     => "required",
            "city_id"               => "required",
            "recipient_zone"        => "required",
            "recipient_area"        => "required",
            "delivery_name"         => "required",
            "delivery_phone"        => "required",
            "item_description"      => "required",
            "special_info"          => "required",
        ];
    }
    public function messages()
    {
        return [
            "store.required"             => 'store required',
            "product_type.required"      => 'product type required',
            "order_id.required"          => 'order id required',
            "recipient_name.required"    => 'recipient name required',
            "recipient_phone.required"   => 'recipient phone required',
            "recipient_address.required" => 'recipient address required',
            "city_id.required"           => 'city id required',
            "recipient_zone.required"    => 'recipient zone required',
            "recipient_area.required"    => 'recipient area required',
            "delivery_name.required"     => 'delivery name required',
            "delivery_phone.required"    => 'delivery phone required',
            "item_description.required"  => 'item description required',
            "special_info.required"      => 'special info required',
        ];
    }
}
