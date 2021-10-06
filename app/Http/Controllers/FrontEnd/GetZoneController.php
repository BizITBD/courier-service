<?php

namespace App\Http\Controllers\FrontEnd;

use App\DeliveryZoneModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetZoneController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $getZone = DeliveryZoneModel::where('city_id', $id)->get();
        return response()->json($getZone, 200);
    }
}
