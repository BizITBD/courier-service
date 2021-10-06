<?php

namespace App\Http\Controllers\FrontEnd;

use App\BookingBaseModel;
use Illuminate\Http\Request;
use App\TransactionBankModel;
use App\TransactionMobileModel;
use App\ResellerCommissionModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ResellerPaymentDashboard extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $resellerCommission = ResellerCommissionModel::where('reseller_id', Auth::guard('login')->user()->id)->get();
        $total_commission = $resellerCommission->sum('commission');
        $payable = ResellerCommissionModel::where('reseller_id', Auth::guard('login')->user()->id)->where('due', '>', 0)->sum('payable');
        $totalBooking = $resellerCommission->count();
        $totalPaid = $resellerCommission->where('due', '>', 0)->sum('paid');
        $totalDue = $resellerCommission->where('due', '>', 0)->sum('due');
        $commission = ResellerCommissionModel::where('reseller_id', Auth::guard('login')->user()->id)->paginate(10);
        $totalSale = BookingBaseModel::where('reseller_id', Auth::guard('login')->user()->id)->get()->sum('product_price');
        // dd($taotalBooking);
        return view('frontend.pages.payment', compact('commission', 'total_commission', 'totalBooking', 'totalPaid', 'totalDue', 'payable', 'totalSale'));
    }
}
