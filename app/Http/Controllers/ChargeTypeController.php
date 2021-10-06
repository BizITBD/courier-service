<?php

namespace App\Http\Controllers;

use App\ChargeType;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ChargeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chargeTypes = ChargeType::get();
        return view('admin.charge-type.index', compact('chargeTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.charge-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modelData = new ChargeType();
        $formData = $request->all();
        $modelData->fill($formData)->save();
        Toastr::success('Data Added Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChargeType  $chargeType
     * @return \Illuminate\Http\Response
     */
    public function show(ChargeType $chargeType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChargeType  $chargeType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chargeType = ChargeType::findOrFail($id);
        return view('admin.charge-type.edit', compact('chargeType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChargeType  $chargeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modelData = ChargeType::findOrFail($id);
        $formData = $request->all();
        $modelData->fill($formData)->save();
        Toastr::success('Data Updated Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect('/admin/charge-type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChargeType  $chargeType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelData = ChargeType::findOrFail($id);
        $modelData->delete();
        return response()->json(null, 204);
    }
    public function status($id)
    {
        $status = ChargeType::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        // Toastr::warning('Status Changed Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
