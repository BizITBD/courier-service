<?php

namespace App\Http\Controllers;

use App\MegaMenu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class MegaMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $megaMenuData = MegaMenu::get();
        return view('admin.mega-menu.index', compact('megaMenuData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mega-menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $megaMenuData = new MegaMenu();
        $data = $request->all();
        $megaMenuData->created_by = Auth::user()->id;
        $megaMenuData->slug = Str::slug($request->title, '-');
        // dd($request->all());
        if ($request->hasFile('icon')) {
            $extension = $request->file('icon')->getClientOriginalExtension();
            $name = 'icon_' . Str::random(5) . '.' . $extension;
            $path = "assets/images/megamenu-icon/";
            $request->file('icon')->move($path, $name);
            $data['icon'] = $path . $name;
        }
        if ($request->hasFile('banner')) {
            $extension = $request->file('banner')->getClientOriginalExtension();
            $name = 'banner_' . Str::random(5) . '.' . $extension;
            $path = "assets/images/megamenu-banner/";
            $request->file('banner')->move($path, $name);
            $data['banner'] = $path . $name;
        }
        $megaMenuData->fill($data)->save();
        Toastr::success('Mega Menu Created Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MegaMenu  $megaMenu
     * @return \Illuminate\Http\Response
     */
    public function show(MegaMenu $megaMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MegaMenu  $megaMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = MegaMenu::findOrFail($id);
        return view('admin.mega-menu.edit', compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MegaMenu  $megaMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $megaMenuData = MegaMenu::findOrFail($id);
        $data = $request->all();
        // dd($request->all());
        if ($request->hasFile('icon')) {
            $extension = $request->file('icon')->getClientOriginalExtension();
            $name = 'icon_' . Str::random(5) . '.' . $extension;
            $path = "assets/images/megamenu-icon/";
            $request->file('icon')->move($path, $name);
            $data['icon'] = $path . $name;
        }
        if ($request->hasFile('banner')) {
            $extension = $request->file('banner')->getClientOriginalExtension();
            $name = 'banner_' . Str::random(5) . '.' . $extension;
            $path = "assets/images/megamenu-banner/";
            $request->file('banner')->move($path, $name);
            $data['banner'] = $path . $name;
        }
        $megaMenuData->fill($data)->save();
        Toastr::success('Mega MEnu Updated Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->to('/admin/mega-menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MegaMenu  $megaMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = MegaMenu::findOrFail($id);
        $deleteData->delete();
        // Toastr::warning('Product Deleted Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return response()->json(null, 204);
    }
    public function status($id)
    {
        $megaMenuStatus = MegaMenu::findOrFail($id);
        if ($megaMenuStatus->status == 0) {
            $megaMenuStatus->status = 1;
        } else {
            $megaMenuStatus->status = 0;
        }
        $megaMenuStatus->save();
        Toastr::success('status changed Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
