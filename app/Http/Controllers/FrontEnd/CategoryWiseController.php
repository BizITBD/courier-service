<?php

namespace App\Http\Controllers\FrontEnd;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CategoryWiseController extends Controller
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
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->Active()->paginate(24);
        return view('frontend.pages.categorywise', compact('category', 'products', 'categoryName'));
    }
}
