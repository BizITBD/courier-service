<?php

namespace App\Http\Controllers\FrontEnd;

use App\CityModel;
use App\ChargeType;
use App\MerchantBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MerchantBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = CityModel::get();
        $types = ChargeType::get();
        return view('frontend.pages.merchantbooking', compact('cities', 'types'));
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
        $model = new MerchantBooking();


        $companyName = Auth::guard('login')->user()->company_name;
        $payable = $request->cashto_collect - $request->charges;
        $mercahantId = Auth::guard('login')->user()->id;
        $companyName = Auth::guard('login')->user()->company_name;
        $storeName = explode(" ", $companyName);
        $prefix = "";
        foreach ($storeName as $value) {
            $prefix .= $value[0];
        }
        $upperPrefix = strtoupper($prefix);
        $latestID = MerchantBooking::latest()->first()->id ?? 0;
        $mainOrderID = sprintf("%s-%06d", $upperPrefix, ++$latestID);



        $request['date'] = date('Y-m-d');
        $request['booking_id'] = $mainOrderID;
        $request['pay'] = $payable;
        $request['merchant_id'] = $mercahantId;
        $request['store_name'] = $companyName;
        $request['paid'] = 0;
        $request['due'] = 0;
        $request['payable'] = 0;
        // dd($request->all());
        $bookingData = $request->all();
        $model->fill($bookingData)->save();
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
        //
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
        //
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
