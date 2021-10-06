<?php

namespace App\Http\Controllers\FrontEnd\Api;

use App\Http\Controllers\Controller;
use App\Product;
use App\ResellerCommissionModel;
use Illuminate\Http\Request;

class GetCommissionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $productCommission = Product::where('id', $id)->get();
        return response()->json($productCommission, 200);
    }
}
