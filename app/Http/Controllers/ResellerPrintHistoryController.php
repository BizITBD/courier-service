<?php

namespace App\Http\Controllers;

use App\ResellerPayBase;
use Illuminate\Http\Request;

class ResellerPrintHistoryController extends Controller
{
    public function index($id)
    {
        $infoData = ResellerPayBase::with('reseller', 'paidby', 'invoiceInfo')->where('id', $id)->first();
        // dd($infoData);
        return view('payment-history-print.reseller-history-print', compact('infoData'));
    }
}
