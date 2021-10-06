<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategoryModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\SubcategoryRequest;

class ProductSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategoryData = SubCategoryModel::with('category')->get();
        return view('admin.sub-category.index', compact('subcategoryData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {
        $subcategory = new SubCategoryModel();
        $form_data = $request->all();
        $form_data['slug'] = Str::slug($request->name, '-');
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'subcategory_' . Str::random(5) . '.' . $extension;
            $path = "assets/images/subcategories/";
            $request->file('image')->move($path, $name);
            $form_data['image'] = $path . $name;
        }
        $subcategory->fill($form_data)->save();
        Toastr::success('Subcategory Added Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        // Toastr::success('Product Added Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/product_sub_category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategories = SubCategoryModel::where('id,$id')->where('status', 1)->get();
        return view('admin.product.create', compact($subcategories));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategories = SubCategoryModel::findOrFail($id);
        $categories = Category::get();
        return view('admin.sub-category.edit', compact('subcategories', 'categories'));
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
        $subcategory = SubCategoryModel::findOrFail($id);
        $form_data = $request->all();
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'subcategory_' . Str::random(5) . '.' . $extension;
            $path = "assets/images/subcategories/";
            $request->file('image')->move($path, $name);
            $form_data['image'] = $path . $name;
        }
        $subcategory->fill($form_data)->save();
        Toastr::success('Subcategory Updated Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/product_sub_category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategorydta = SubCategoryModel::findOrFail($id);
        $subcategorydta->delete();
        // Toastr::warning('Subcategory Deleted', 'Done', ["positionClass" => "toast-top-right"]);
        return response()->json(null, 204);
    }

    public function status($id)
    {
        $subcategory_status = SubCategoryModel::findOrFail($id);
        if ($subcategory_status->status == 0) {
            $subcategory_status->status = 1;
        } else {
            $subcategory_status->status = 0;
        }
        $subcategory_status->save();
        Toastr::success('Status Changed Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
