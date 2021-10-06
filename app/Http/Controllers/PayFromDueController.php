<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResellerCommissionModel;
use App\ResellerCommissionPayModel;

class PayFromDueController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        foreach ($request->invoice_id as $key => $value) {
            $oldCommission = ResellerCommissionModel::where('invoice_id', $value)->first();
            $oldCommission->due -= $request->pay[$key];
            $oldCommission->paid += $request->pay[$key];
            $oldCommission->save();


            $paymentMethod = new ResellerCommissionPayModel();
            $paymentMethod->transaction_type = $request->transaction_type;
            $paymentMethod->transaction_id = $request->transaction_id;
            $paymentMethod->invoice_id = $oldCommission->invoice_id;
            $paymentMethod->date = date('y-m-d');
            $paymentMethod->amount = $request->pay[$key];
            $paymentMethod->reseller_id = $oldCommission->reseller_id;
            $paymentMethod->save();
        };
        return redirect()->back();
    }
}
