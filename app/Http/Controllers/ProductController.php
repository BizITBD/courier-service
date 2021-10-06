<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\SubCategoryModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_list['product_data'] = Product::with('category', 'subcategory')->orderBy('id', 'desc')->paginate(30);

        // echo "<pre>";
        // print_r($product_list);
        return view('admin.product.index', $product_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorydata['data'] = Category::get();
        return view('admin.product.create', $categorydata);
    }
    public function subcategory($id)
    {
        $subcategories = SubCategoryModel::where('category_id', $id)->get();
        return response()->json($subcategories, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    { {
            $product = new Product();
            $form_data = $request->all();
            $form_data['slug'] = Str::slug($request->name, '-');
            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $name = 'product_' . Str::random(5) . '.' . $extension;
                $path = "assets/images/product/";
                $request->file('image')->move($path, $name);
                $form_data['image'] = $path . $name;
            }
            if ($request->commission_percent) {
                $form_data['reseller_commission'] = $request->sell_price * ($request->commission_percent / 100);
            }

            $product->fill($form_data)->save();
            Toastr::success('Product Added Successfully', 'Done', ["positionClass" => "toast-top-right"]);
            return redirect()->to('/admin/product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::get();
        // dd($product);
        return view("admin.product.edit", compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $update_data = $request->all();
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'product_' . Str::random(5) . '.' . $extension;
            $path = "assets/images/product/";
            $request->file('image')->move($path, $name);
            $update_data['image'] = $path . $name;
        }
        if ($request->commission_percent) {
            $update_data['reseller_commission'] = $request->sell_price * ($request->commission_percent / 100);
        }
        $product->fill($update_data)->save();
        Toastr::success('Product Updated Successfully', 'Done', ["positionClass" => "toast-top-right"]);
        return redirect()->to('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteProduct = Product::findOrFail($id);
        $deleteProduct->delete();
        //Toastr::warning('Product Deleted Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return response()->json(null, 204);
    }
    public function status($id)
    {
        $product_status = Product::findOrFail($id);
        if ($product_status->status == 0) {
            $product_status->status = 1;
        } else {
            $product_status->status = 0;
        }
        $product_status->save();
        Toastr::warning('Status Changed Successfully', 'Done', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
