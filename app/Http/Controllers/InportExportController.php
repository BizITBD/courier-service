<?php

namespace App\Http\Controllers;

use App\CityModel;
use App\ChargeType;
use App\InportExport;
use App\DeliveryZoneModel;
use Illuminate\Http\Request;
use App\Exports\CoverageAreaExport;
use Maatwebsite\Excel\Facades\Excel;

class InportExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coverageData = InportExport::with('city', 'area')->get();
        $chargeType = ChargeType::get();
        // dd($coverageData);
        return view('admin.coverage-area.index', compact('coverageData', 'chargeType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = CityModel::get();

        return view('admin.coverage-area.create', compact('cities'));
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
        $model = new InportExport();
        $formData = $request->all();
        $model->fill($formData)->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InportExport  $inportExport
     * @return \Illuminate\Http\Response
     */
    public function show(InportExport $inportExport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InportExport  $inportExport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $oldData = InportExport::findOrFail($id);
        $cities = CityModel::get();
        $areas = DeliveryZoneModel::where('city_id', $oldData->city_id)->get();
        // dd($areas->toArray());
        return view('admin.coverage-area.edit', compact('oldData', 'cities', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InportExport  $inportExport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modelData = InportExport::findOrFail($id);
        $formData = $request->all();
        $modelData->fill($formData)->save();
        return redirect()->to('/admin/coverage_area');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InportExport  $inportExport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelData = InportExport::findOrFail($id);
        $modelData->delete();
        return response()->json(null, 204);
    }
    public function area($id)
    {
        $areas = DeliveryZoneModel::where('city_id', $id)->get();
        return response()->json($areas, 200);
    }


    public function status($id)
    {
        $status = InportExport::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        // Toastr::warning('Status Changed Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
    public function export()
    {
        return Excel::downoload(new CoverageAreaExport, 'coveragearea.xlsx');
    }
}
