<?php

namespace App\Http\Controllers;

use App\CityModel;
use App\DeliveryZoneModel;
use Illuminate\Http\Request;
use App\Http\Requests\zoneRequest;

class DeliveryZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zoneData = DeliveryZoneModel::with('city')->get();
        return view('admin.deliveryzone.index', compact('zoneData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cityName = CityModel::get();
        return view('admin.deliveryzone.create', compact('cityName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(zoneRequest $request)
    {
        $zone = new DeliveryZoneModel;
        $zoneData = $request->all();
        $zone->fill($zoneData)->save();
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
        $editZoneData = DeliveryZoneModel::findOrFail($id);
        $citydata = CityModel::get();
        return view('admin.deliveryzone.edit', compact('editZoneData', 'citydata'));
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
        $data = DeliveryZoneModel::findOrFail($id);
        $updatedata = $request->all();
        $data->fill($updatedata)->save();
        return redirect()->to('/admin/delivery_zone');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = DeliveryZoneModel::findOrFail($id);
        $deleteData->delete();
        return response()->json(null, 204);
    }
    public function status($id)
    {
        $cityId = DeliveryZoneModel::findOrFail($id);
        if ($cityId->status == 0) {
            $cityId->status = 1;
        } else {
            $cityId->status = 0;
        }
        $cityId->save();
        return redirect()->back();
    }
}
