<?php

namespace App\Http\Controllers;

use App\MerchantBooking;
use App\MerchantPayBase;
use App\MerchantPayment;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class MerchantPayController extends Controller
{
    public function pay(request $request)
    {

        $payBase = new MerchantPayBase();
        $payBase->date = date('y-m-d');
        $payBase->merchant_id = $request->reseller_id;
        $payBase->total_Amount = collect($request->pay)->sum();
        $payBase->created_by =  Auth::user()->id;
        $payBase->save();

        foreach ($request->invoice_id as $key => $value) {
            // dd($request->all());
            if ($request->pay[$key] > 0) {
                $oldCommission = MerchantBooking::where('booking_id', $value)->first();
                $oldCommission->due -= $request->pay[$key];
                $oldCommission->paid += $request->pay[$key];
                $oldCommission->save();


                $paymentMethod = new MerchantPayment();
                $paymentMethod->transaction_type = $request->transaction_type;
                $paymentMethod->transaction_id = $request->transaction_id;
                $paymentMethod->base_id = $payBase->id;
                $paymentMethod->booking_id = $oldCommission->booking_id;
                $paymentMethod->date = date('y-m-d');
                $paymentMethod->amount = $request->pay[$key];
                $paymentMethod->reseller_id = $oldCommission->merchant_id;
                $paymentMethod->created_by = Auth::user()->id;
                $paymentMethod->save();
            }
        };
        Toastr::success('Merchant Payment Successful', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
