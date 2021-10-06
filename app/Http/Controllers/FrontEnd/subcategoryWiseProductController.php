<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\SubCategoryModel;
use Illuminate\Http\Request;

class subcategoryWiseProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $subcategories = SubCategoryModel::where('category_id', $id)->get();
        return response()->json($subcategories, 200);
    }
}
