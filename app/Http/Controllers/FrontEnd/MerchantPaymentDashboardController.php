<?php

namespace App\Http\Controllers\FrontEnd;

use App\MerchantBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MerchantPayment;
use Illuminate\Support\Facades\Auth;

class MerchantPaymentDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $merchantBookingData = MerchantBooking::where('merchant_id', Auth::guard('login')->user()->id)->paginate(20);
        $totalBooking = $merchantBookingData->count('booking_id');
        $paid = $merchantBookingData->sum('paid');
        $due = $merchantBookingData->sum('due');
        $totalcash = $merchantBookingData->sum('pay');
        $totalPayable = $merchantBookingData->sum('payable');
        return view('frontend.pages.merchant-payment', compact('merchantBookingData', 'totalcash', 'totalBooking', 'paid', 'due', 'totalPayable'));
    }
}
