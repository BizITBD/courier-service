<?php

namespace App\Http\Controllers\FrontEnd;

use App\BookingBaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\ResellerCommissionModel;
use Illuminate\Support\Facades\Auth;

class SuccessfullDeliveryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $deliveredBookings = BookingBaseModel::where('status', 2)->where('reseller_id', Auth::guard('login')->user()->id)->get();
        $commissions = ResellerCommissionModel::whereIn('invoice_id', $deliveredBookings->pluck('order_id')->toArray())->get();
        $totalCommission = $commissions->sum('commission');
        // dd($commissions);

        // dd($deliveredBookings);
        return view('frontend/pages/successful-booking', compact('commissions', 'totalCommission'));
    }
}
