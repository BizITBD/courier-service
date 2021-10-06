<?php

namespace App\Http\Controllers\FrontEnd\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductPriceApi extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $productPrice = Product::findOrFail($id)->sell_price;
        return response()->json($productPrice, 200);
    }
}
