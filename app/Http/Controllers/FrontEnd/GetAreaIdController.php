<?php

namespace App\Http\Controllers\FrontEnd;

use App\InportExport;
use App\CoverageAreaCharge;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetAreaIdController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(request $request)
    {
        $areaId = InportExport::where('city_id', $request['cityid'])->where('area_id', $request['areaId'])->first()->id;
        $totalData = CoverageAreaCharge::with('type')->where('coverage_id', $areaId)->get();
        return response()->json($totalData, 200);
    }
}
