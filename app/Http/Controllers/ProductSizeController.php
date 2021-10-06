<?php

namespace App\Http\Controllers;

use App\ProductSizeModel;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productSize = ProductSizeModel::get();
        return view('admin.product-size.index', compact('productSize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product-size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'size' => 'required',
        ]);
        $sizeModel = new ProductSizeModel();
        $data = $request->all();
        $sizeModel->fill($data)->save();
        return redirect()->back();
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
        $editData = ProductSizeModel::findOrFail($id);
        return view('admin.product-size.edit', compact('editData'));
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
        $sizeModel = ProductSizeModel::findOrFail($id);
        $data = $request->all();
        $sizeModel->fill($data)->save();
        return redirect()->to('/admin/product_size');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ProductSize = ProductSizeModel::findOrFail($id);
        $ProductSize->delete();
        return response()->json(null, 204);
    }
    public function status($id)
    {
        $Status = ProductSizeModel::findOrFail($id);
        if ($Status->status == 0) {
            $Status->status = 1;
        } else {
            $Status->status = 0;
        }
        $Status->save();
        // Toastr::warning('Status Changed Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
