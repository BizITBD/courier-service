<?php

namespace App\Http\Controllers;

use App\OurServicesModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\ServiceProvider;

class OurServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceData = OurServicesModel::get();
        return view('admin.app-settings.our-services.index', compact('serviceData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.app-settings.our-services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $modelData = new OurServicesModel();
        $formData = $request->all();
        if ($request->hasFile('icon')) {
            $extension = $request->file('icon')->getClientOriginalExtension();
            $name = 'product_' . Str::random(5) . '.' . $extension;
            $path = "assets/images/service_icons/";
            $request->file('icon')->move($path, $name);
            $formData['icon'] = $path . $name;
        }
        $modelData->fill($formData)->save();
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
        $serviceData = OurServicesModel::findOrFail($id);
        return view('admin.app-settings.our-services.edit', compact('serviceData'));
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
        $serviceData = OurServicesModel::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('icon')) {
            $extension = $request->file('icon')->getClientOriginalExtension();
            $name = 'product_' . Str::random(5) . '.' . $extension;
            $path = "assets/images/service_icons/";
            $request->file('icon')->move($path, $name);
            $data['icon'] = $path . $name;
        }
        $serviceData->fill($data)->save();
        return redirect()->to('/admin/our_services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceData = OurServicesModel::findOrFail($id);
        $serviceData->delete();
        return response()->json(null, 204);
    }
    public function status($id)
    {
        $serviceData = OurServicesModel::findOrFail($id);
        if ($serviceData->status == 0) {
            $serviceData->status = 1;
        } else {
            $serviceData->status = 0;
        }
        $serviceData->save();
        return redirect()->back();
    }
}
