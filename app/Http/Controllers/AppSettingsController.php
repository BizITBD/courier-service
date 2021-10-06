<?php

namespace App\Http\Controllers;

use App\AppSettingsModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\IniSetting;

class AppSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settinsdata = AppSettingsModel::first();
        return view('admin.app-settings.index', compact('settinsdata'));
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
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settings = AppSettingsModel::first();
        return response()->json($settings, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $settingModel = AppSettingsModel::findOrFail($id);
        $data = $request->all();
        // dd($data);
        if ($request->hasFile('banner_picture')) {
            $extension = $request->file('banner_picture')->getClientOriginalExtension();
            $name = 'bannerPicture_' . Str::random(5) . '.' . $extension;
            $path = "frontend-assets/assets/img/banner-logo/";
            $request->file('banner_picture')->move($path, $name);
            $data['banner_picture'] = $path . $name;
        }
        if ($request->hasFile('company_logo')) {
            $extension = $request->file('company_logo')->getClientOriginalExtension();
            $name = 'company_logo_' . Str::random(5) . '.' . $extension;
            $path = "frontend-assets/assets/img/company-logo/";
            $request->file('company_logo')->move($path, $name);
            $data['company_logo'] = $path . $name;
        }
        if ($request->hasFile('fav_icon')) {
            $extension = $request->file('fav_icon')->getClientOriginalExtension();
            $name = 'fav_icon_' . Str::random(5) . '.' . $extension;
            $path = "frontend-assets/assets/img/fav-icon/";
            $request->file('fav_icon')->move($path, $name);
            $data['fav_icon'] = $path . $name;
        }

        $settingModel->fill($data)->save();
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
        //
    }
}
