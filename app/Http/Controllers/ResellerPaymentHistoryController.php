<?php

namespace App\Http\Controllers;

use App\ResellerCommissionPayModel;
use App\ResellerPayBase;
use Illuminate\Http\Request;

class ResellerPaymentHistoryController extends Controller
{
    public function index()
    {
        $paymentHistory = ResellerPayBase::with('reseller')->get();
        return view('admin.payment-list.reseller-payment-list', compact('paymentHistory'));
    }
    public function getInfo($id)
    {
        $infoData = ResellerPayBase::with('reseller', 'createdBy', 'invoiceInfo')->where('id', $id)->first();
        // dd($infoData);
        return response()->json($infoData, 200);
    }
}
