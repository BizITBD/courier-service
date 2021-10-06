<?php

namespace App\Http\Controllers;

use App\Interests;
use Illuminate\Http\Request;

class InterestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interests = Interests::orderBy('id', 'DESC')->get();
        return view('admin.interests.index', compact('interests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Interests();
        $formData = $request->all();
        $model->fill($formData)->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interests  $interests
     * @return \Illuminate\Http\Response
     */
    public function show(Interests $interests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interests  $interests
     * @return \Illuminate\Http\Response
     */
    public function edit(Interests $interests)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interests  $interests
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interests $interests)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interests  $interests
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Interests::findOrFail($id);
        $deleteData->delete();
        return response()->json(null, 204);
    }
    public function status($id)
    {
        $statusData = Interests::findOrFail($id);
        if ($statusData->status == 1) {
            $statusData->status = 0;
        } else {
            $statusData->status = 1;
        }
        $statusData->save();
        return redirect()->back();
    }
}
