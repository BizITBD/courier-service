<?php

namespace App\Http\Controllers\FrontEnd;

use App\BookingBaseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class resellerdashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $delivery_data = BookingBaseModel::where('reseller_id', Auth::guard('login')->id())->orderBy('id', 'DESC')->get();
        $total_delivery = $delivery_data->count('order_id');
        return view('frontend.pages.resellerdashboard', compact('delivery_data', 'total_delivery'));
    }
}
