<?php

namespace App\Http\Controllers\FrontEnd\Api;

use App\BookingBaseModel;
use App\BookingRecipentModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResellerwiseShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $showdata = BookingBaseModel::with(['recipent', 'delivery', 'product', 'recipent.city', 'product.product', 'product.category'])->findOrFail($id);
        return response()->json($showdata, 200);
    }
}
