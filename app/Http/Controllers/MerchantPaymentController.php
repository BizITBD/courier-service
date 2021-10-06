<?php

namespace App\Http\Controllers;

use App\Reseller;
use App\MerchantBooking;
use App\MerchantPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MerchantPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchantPaymentData = MerchantBooking::with('Reseller')
            ->select(
                '*',
                DB::raw('count(booking_id) as total_booking'),
                DB::raw('sum(payable) as total_payable'),
                DB::raw('sum(due) as total_due')
            )
            ->groupBy('merchant_id')
            ->get();
        // dd($merchantPaymentData);
        return view('admin.merchant-payment.index', compact('merchantPaymentData'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Merchant_details = Reseller::with('paymentData')->findOrFail($id);
        //dd($reseller_details);
        return response()->json($Merchant_details, 200);
    }
    public function history($id)
    {
        $Merchant_details = Reseller::with('paymentData')->findOrFail($id);
        //dd($reseller_details);
        return response()->json($Merchant_details, 200);
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
