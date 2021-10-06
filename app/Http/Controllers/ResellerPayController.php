<?php

namespace App\Http\Controllers;

use App\ResellerPayBase;
use Illuminate\Http\Request;
use App\ResellerCommissionModel;
use App\ResellerCommissionPayModel;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ResellerPayController extends Controller
{
    public function pay(request $request)
    {
        $payBase = new ResellerPayBase();
        $payBase->date = date('y-m-d');
        $payBase->reseller_id = $request->reseller_id;
        $payBase->total_Amount = collect($request->pay)->sum();
        $payBase->created_by =  Auth::user()->id;
        $payBase->save();


        foreach ($request->invoice_id as $key => $value) {
            if ($request->pay[$key] > 0) {
                $oldCommission = ResellerCommissionModel::where('invoice_id', $value)->first();
                $oldCommission->due -= $request->pay[$key];
                $oldCommission->paid += $request->pay[$key];
                $oldCommission->save();


                $paymentMethod = new ResellerCommissionPayModel();
                $paymentMethod->base_id = $payBase->id;
                $paymentMethod->transaction_type = $request->transaction_type;
                $paymentMethod->transaction_id = $request->transaction_id;
                $paymentMethod->invoice_id = $oldCommission->invoice_id;
                $paymentMethod->date = date('y-m-d');
                $paymentMethod->amount = $request->pay[$key];
                $paymentMethod->reseller_id = $oldCommission->reseller_id;
                $paymentMethod->created_by = Auth::user()->id;
                $paymentMethod->save();
            }
        };
        Toastr::success('Payment Successful!', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
