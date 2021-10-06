<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductDataGetController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $subcategoryId = $request->subcategory;
        $productDataGet = Product::where(function ($query) use ($subcategoryId, $id) {
            if ($subcategoryId != null) {
                $query->where('subcategory_id', $subcategoryId);
            }
            if ($id) {
                $query->where('category_id', $id);
            }
        })->get();
        return response()->json($productDataGet, 200);
    }
}
