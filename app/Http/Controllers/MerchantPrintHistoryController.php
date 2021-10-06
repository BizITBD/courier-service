<?php

namespace App\Http\Controllers;

use App\MerchantPayBase;
use Illuminate\Http\Request;

class MerchantPrintHistoryController extends Controller
{
    public function index($id)
    {
        $infoData = MerchantPayBase::with('reseller', 'paidby', 'invoiceInfo')->where('id', $id)->first();
        // dd($infoData->toArray());
        return view('payment-history-print.merchant-history-print', compact('infoData'));
    }
}
