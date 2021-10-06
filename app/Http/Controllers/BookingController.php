<?php

namespace App\Http\Controllers;

use App\BookingBaseModel;
use App\BookingPaymentModel;
use Illuminate\Http\Request;
use App\ResellerCommissionModel;
use App\ResellerCommissionPayModel;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookingData = BookingBaseModel::with('reseller')->orderBy('id', 'DESC')->paginate(20);
        return view('admin.booking_details.index', compact('bookingData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showData = BookingBaseModel::with(['recipent', 'delivery', 'product', 'recipent.city', 'product.product', 'product.category', 'reseller'])->findOrFail($id);
        return response()->json($showData, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking_status = BookingBaseModel::findOrFail($id);
        $booking_status->delete();
        // Toastr::warning('Product Deleted Successfully', 'Done', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
    public function status(Request $request, $id)
    {
        // $booking_status = BookingBaseModel::findOrFail($id);
        // if ($booking_status->status == 0) {
        //     $booking_status->status = 1;
        // } else {
        //     $booking_status->status = 0;
        // }
        // $booking_status->save();

        $model_object = BookingBaseModel::findOrFail($id);
        $booking_status = $request->status;
        $model_object->status = $booking_status;
        $model_object->save();

        if ($request->status == 2) {
            $paidAmount = BookingPaymentModel::where('type', 'Advance')->where('invoice_id', $id)->first();
            $resellerCommission = ResellerCommissionModel::where('invoice_id', $model_object->order_id)->first();
            $resellerCommission->payable = $resellerCommission->commission;
            $resellerCommission->paid = $paidAmount->amount ?? 0;
            $resellerCommission->due =  $resellerCommission->commission - ($paidAmount->amount ?? 0);
            $resellerCommission->save();
            if ($paidAmount) {
                // $resellerCommissionPay = new ResellerCommissionPayModel();
                // $resellerCommissionPay->invoice_id = $id;
                // $resellerCommissionPay->date = date('y-m-d');
                // $resellerCommissionPay->amount = $model_object->paid_amount;
                // $resellerCommissionPay->reseller_id = $model_object->reseller_id;
                // $resellerCommissionPay->created_by = $model_object->reseller_id;
                // $resellerCommissionPay->save();
                $payment[] = [
                    "invoice_id" => $id,
                    "date" => date('y-m-d'),
                    "reseller_id" => $model_object->reseller_id,
                    "amount" => $paidAmount->amount,
                    "created_by" => $model_object->reseller_id,
                ];
                ResellerCommissionPayModel::insert($payment);
            }
        }
        return redirect()->back();
    }
}
