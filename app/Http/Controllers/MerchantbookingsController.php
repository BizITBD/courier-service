<?php

namespace App\Http\Controllers;

use App\AppSettingsModel;
use App\MerchantBooking;
use App\CoverageAreaCharge;
use Illuminate\Http\Request;

class MerchantbookingsController extends Controller
{
    public function index()
    {
        $coverageAreaCharges = CoverageAreaCharge::with('type')->get();
        $bookingList = MerchantBooking::with('City', 'Area', 'Reseller')->orderBy('id', 'DESC')->paginate(30);
        return view('admin.merchant-booking-list.list', compact('bookingList', 'coverageAreaCharges'));
    }
    public function getBookingDetails($id)
    {
        $termsAndCondition = AppSettingsModel::where('id', 1)->first();
        $merchantBookingDetails = MerchantBooking::with('Reseller')->findOrFail($id);
        $data = [
            'termsAndCondition' => $termsAndCondition,
            'merchantBooking' => $merchantBookingDetails,
        ];
        return response()->json($data, 200);
    }
    public function status(Request $request, $id)
    {
        $model_object = MerchantBooking::findOrFail($id);
        $booking_status = $request->status;
        $model_object->status = $booking_status;
        $model_object->save();
        if ($request->status == 2) {
            $modelData = MerchantBooking::findOrFail($id);
            $payData = $modelData->pay;
            // dd($payData);
            $modelData['payable'] = $payData;
            $modelData['due'] = $payData;
            $modelData->save();
        }
        return redirect()->back();
    }
}
