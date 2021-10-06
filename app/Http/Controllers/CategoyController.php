<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

class CategoyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_list['categories'] = Category::get();
        return view('admin.category.index', $category_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $requested_data = $request->all();
        $category = new Category();
        $requested_data['slug'] = Str::slug($request->name, '-');
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'category_' . Str::random(5) . '.' . $extension;
            $path = "assets/images/category/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
        $category->fill($requested_data)->save();
        $notification = [
            'title'      => 'Category',
            'message'    => 'Successfully! Category Information Saved.',
            'alert-type' => 'success',
        ];

        return response()->json($notification, 200);
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
        $editdata = Category::findOrFail($id);
        return response()->json($editdata, 200);
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
        $category = Category::findOrFail($id);
        $update_data = $request->all();
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'category_' . Str::random(5) . '.' . $extension;
            $path = "assets/images/category/";
            $request->file('image')->move($path, $name);
            $update_data['image'] = $path . $name;
        }
        // // $category=new Category();
        $category->fill($update_data)->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        $status = 201;
        $response = [
            'status' => $status,
            'message' => 'Category Deleted!'
        ];
        return response()->json($response, $status);
    }
    public function status($id)
    {
        $category = Category::findOrFail($id);
        if ($category->status == 0) {
            $category->status = 1;
        } else {
            $category->status = 0;
        }
        $category->save();
        $status = 201;
        $response = [
            'status' => $status,
            'message' => 'Category Deleted!'
        ];
        return redirect()->back();
    }
}
