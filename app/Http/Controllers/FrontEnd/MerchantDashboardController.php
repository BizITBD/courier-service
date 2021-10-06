<?php

namespace App\Http\Controllers\FrontEnd;

use App\MerchantBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MerchantDashboardController extends Controller
{
    public function table()
    {
        $delivery_data = MerchantBooking::where('merchant_id', Auth::guard('login')->id())->orderBy('id', 'DESC')->get();
        return view('frontend.pages.merchant-dashboard', compact('delivery_data'));
    }
    public function bookingDetails($id)
    {
        $bookingDetails = MerchantBooking::findOrFail($id);
        return response()->json($bookingDetails);
    }
}
