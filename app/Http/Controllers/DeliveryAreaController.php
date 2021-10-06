<?php

namespace App\Http\Controllers;

use App\DeliveryAreaModel;
use App\DeliveryZoneModel;
use Illuminate\Http\Request;

class DeliveryAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areaData = DeliveryAreaModel::with('zone')->get();
        return view('admin.deliveryarea.index', compact('areaData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zoneName = DeliveryZoneModel::get();
        return view('admin.deliveryarea.create', compact('zoneName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $areas = new DeliveryAreaModel();
        $formData = $request->all();
        $areas->fill($formData)->save();
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
        $editData = DeliveryAreaModel::findOrFail($id);
        $zoneData = DeliveryZoneModel::get();
        return view('admin.deliveryarea.edit', compact('editData', 'zoneData'));
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
        $data = DeliveryAreaModel::findOrFail($id);
        $updatedata = $request->all();
        $data->fill($updatedata)->save();
        return redirect()->to('/admin/delivery_area');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = DeliveryAreaModel::findOrFail($id);
        $deleteData->delete();
        return response()->json(null, 204);
    }
    public function status($id)
    {
        $areaId = DeliveryAreaModel::findOrFail($id);
        if ($areaId->status == 0) {
            $areaId->status = 1;
        } else {
            $areaId->status = 0;
        }
        $areaId->save();
        return redirect()->back();
    }
}
