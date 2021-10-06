<?php

namespace App\Http\Controllers;

use App\MerchantPayBase;
use Illuminate\Http\Request;

class MerchantPaymentHistoryController extends Controller
{
    public function index()
    {
        // dd('hi');
        $paymentHistory = MerchantPayBase::with('reseller')->get();
        return view('admin.payment-list.merchant-payment-list', compact('paymentHistory'));
    }
    public function getInfo($id)
    {
        $infoData = MerchantPayBase::with('reseller', 'createdBy', 'invoiceInfo')->where('id', $id)->first();
        // dd($infoData);
        return response()->json($infoData, 200);
    }
}
