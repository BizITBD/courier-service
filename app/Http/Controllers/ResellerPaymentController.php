<?php

namespace App\Http\Controllers;

use App\Reseller;
use App\BookingBaseModel;
use Illuminate\Http\Request;
use App\ResellerCommissionModel;
use App\TransactionBankModel;
use App\TransactionMobileModel;
use Illuminate\Support\Facades\DB;

class ResellerPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reseller_details =  Reseller::with(['totalCommission' => function ($query) {
            $query->select(
                'reseller_commission.*',
                DB::raw('SUM(reseller_commission.commission) as resellerTotalCommission'),
                DB::raw('COUNT(reseller_commission.invoice_id) as totalBooking'),
                DB::raw('SUM(reseller_commission.paid) as totalPaid')
            )->groupBy('reseller_id');
        }])->get()->toArray();
        // dd($reseller_details);

        return view('admin.reseller-payment.index', compact('reseller_details'));
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
        $reseller_details = Reseller::with('commissionData')->findOrFail($id);
        //dd($reseller_details);
        return response()->json($reseller_details, 200);
    }
    public function history($id)
    {
        $reseller_history = Reseller::with('totalCommission')->findOrFail($id);
        return response()->json($reseller_history, 200);
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
    public function getBankDetails($id)
    {
        $bankDetails = TransactionBankModel::where('reseller_id', $id)->first();
        return response()->json($bankDetails);
    }
    public function getMobileDetails($id)
    {
        $mobileDetails = TransactionMobileModel::where('reseller_id', $id)->first();
        return response()->json($mobileDetails);
    }
}
