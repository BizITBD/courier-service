<?php

namespace App\Http\Controllers\FrontEnd;

use App\Product;
use App\Category;
use App\SubCategoryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryWiseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($slug)
    {
        $categoryName = Category::Active()->get();
        $subCategory = SubCategoryModel::where('slug', $slug)->first();

        $products = Product::where('subcategory_id', $subCategory->id)->Active()->paginate(20);
        return view('frontend.pages.categorywise', compact('subCategory', 'products', 'categoryName'));
    }
}
