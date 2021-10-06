<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUsData = AboutUs::get();
        return view('admin.app-settings.about-us.index', compact('aboutUsData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.app-settings.about-us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aboutUsModel = new AboutUs();
        $data = $request->all();
        if ($request->hasFile('icon')) {
            $extension = $request->file('icon')->getClientOriginalExtension();
            $name = 'icon_' . Str::random(5) . '.' . $extension;
            $path = "frontend-assets/assets/img/our-service-logo/";
            $request->file('icon')->move($path, $name);
            $data['icon'] = $path . $name;
        }
        $aboutUsModel->fill($data)->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutUsData = AboutUs::findOrFail($id);
        return view('admin.app-settings.about-us.edit', compact('aboutUsData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aboutUsData = AboutUs::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('icon') && $aboutUsData->icon != $request->icon) {
            $extension = $request->file('icon')->getClientOriginalExtension();
            $name = 'icon_' . Str::random(5) . '.' . $extension;
            $path = "frontend-assets/assets/img/our-service-logo/";
            $request->file('icon')->move($path, $name);
            $data['icon'] = $path . $name;
        }
        $aboutUsData->fill($data)->save();
        return redirect()->to('/admin/about_us');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutUsData = AboutUs::findOrFail($id);
        $aboutUsData->delete();
        return response()->json(null, 204);
    }
    public function status($id)
    {
        $aboutUsData = AboutUs::findOrFail($id);
        if ($aboutUsData->status == 0) {
            $aboutUsData->status = 1;
        } else {
            $aboutUsData->status = 0;
        }
        $aboutUsData->save();
        return redirect()->back();
    }
}
