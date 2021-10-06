<?php

namespace App\Http\Controllers;

use App\MerchantBooking;
use App\AppSettingsModel;
use Illuminate\Http\Request;

class MerchantBookingPrintController extends Controller
{
    public function index($id)
    {
        $termsAndCondition = AppSettingsModel::where('id', 1)->first();
        $merchantBookingDetails = MerchantBooking::with('Reseller')->findOrFail($id);
        // dd($merchantBookingDetails->toArray());
        return view('merchant-print', compact('termsAndCondition', 'merchantBookingDetails'));
    }
}
