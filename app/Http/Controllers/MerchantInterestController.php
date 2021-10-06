<?php

namespace App\Http\Controllers;

use App\MerchantInterest;
use Illuminate\Http\Request;

class MerchantInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interests = MerchantInterest::orderBy('id', 'DESC')->get();
        return view('admin.interests.merchant-interest-list', compact('interests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interests.merchant-interest-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new MerchantInterest();
        $formData = $request->all();
        $model->fill($formData)->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MerchantInterest  $merchantInterest
     * @return \Illuminate\Http\Response
     */
    public function show(MerchantInterest $merchantInterest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MerchantInterest  $merchantInterest
     * @return \Illuminate\Http\Response
     */
    public function edit(MerchantInterest $merchantInterest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MerchantInterest  $merchantInterest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MerchantInterest $merchantInterest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MerchantInterest  $merchantInterest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = MerchantInterest::findOrFail($id);
        $deleteData->delete();
        return response()->json(null, 204);
    }
    public function status($id)
    {
        $statusData = MerchantInterest::findOrFail($id);
        if ($statusData->status == 1) {
            $statusData->status = 0;
        } else {
            $statusData->status = 1;
        }
        $statusData->save();
        return redirect()->back();
    }
}
