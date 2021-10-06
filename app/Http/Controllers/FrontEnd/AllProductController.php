<?php

namespace App\Http\Controllers\FrontEnd;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class AllProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $products = Product::Active()->paginate(24);
        $category = Category::with('subCategory')->where('status', 1)->paginate(10);

        // dd($category->toArray());
        return view('frontend.pages.allproducts', compact('category'));
    }
}
