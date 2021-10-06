<?php

namespace App\Http\Controllers;

use App\ChargeType;
use App\CoverageAreaCharge;
use Illuminate\Http\Request;

class CoverageAreaChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $data = [];
        foreach ($request->type_id as $key => $value) {
            $data[] = [
                "coverage_id"   => $request->coverage_id,
                "type_id"       => $value,
                "cost"          => $request->cost[$key],
            ];
        }
        CoverageAreaCharge::insert($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CoverageAreaCharge  $coverageAreaCharge
     * @return \Illuminate\Http\Response
     */
    public function show(CoverageAreaCharge $coverageAreaCharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CoverageAreaCharge  $coverageAreaCharge
     * @return \Illuminate\Http\Response
     */
    public function edit(CoverageAreaCharge $coverageAreaCharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CoverageAreaCharge  $coverageAreaCharge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoverageAreaCharge $coverageAreaCharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CoverageAreaCharge  $coverageAreaCharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoverageAreaCharge $coverageAreaCharge)
    {
        //
    }
}
