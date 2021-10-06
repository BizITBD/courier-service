<?php

namespace App\Http\Controllers\FrontEnd\Api;

use App\CityModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryFeeApi extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $deliveryFee = CityModel::findOrFail($id);
        return response()->json($deliveryFee->delivery_fee, 200);
    }
}
