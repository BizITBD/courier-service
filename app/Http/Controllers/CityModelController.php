<?php

namespace App\Http\Controllers;

use App\CityModel;
use App\Http\Requests\DeliveryCityRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CityModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citydata = CityModel::get();
        return view('admin.deliverycity.index', compact('citydata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deliverycity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeliveryCityRequest $request)
    {
        $city = new CityModel();
        $citydata = $request->all();
        $city->fill($citydata)->save();
        // $notification = [
        //     'title'      => 'CITY',
        //     'message'    => 'Successfully! City Adeed.',
        //     'alert-type' => 'success',
        // ];
        Toastr::success('Product Added Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/deliverycity');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CityModel  $cityModel
     * @return \Illuminate\Http\Response
     */
    public function show(CityModel $cityModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CityModel  $cityModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = CityModel::findOrFail($id);
        return view('admin.deliverycity.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CityModel  $cityModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = CityModel::findOrFail($id);
        $updatedata = $request->all();
        $data->fill($updatedata)->save();
        return redirect()->to('/admin/deliverycity');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CityModel  $cityModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = CityModel::findOrFail($id);
        $deleteData->delete();
        return \redirect()->back();
    }
    public function status($id)
    {
        $cityId = CityModel::findOrFail($id);
        if ($cityId->status == 0) {
            $cityId->status = 1;
        } else {
            $cityId->status = 0;
        }
        $cityId->save();
        return redirect()->back();
    }
}
