<?php

namespace App\Http\Controllers\FrontEnd;

use App\DeliveryAreaModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAreaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $getArea = DeliveryAreaModel::where('zone_id', $id)->get();
        return response()->json($getArea, 200);
    }
}
