<?php

namespace App\Http\Controllers\FrontEnd;

use App\Product;
use App\Category;
use App\CityModel;
use App\BookingBaseModel;
use App\ProductSizeModel;
use App\DeliveryZoneModel;
use App\BookingPaymentModel;
use App\BookingProductModel;
use Illuminate\Http\Request;
use App\BookingRecipentModel;
use App\ResellerCommissionModel;
use App\Http\Controllers\Controller;
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

        if (Auth::guard('login')->check()) {
            $cetegories = Category::get();
            $cities = CityModel::get();
            $zones = DeliveryZoneModel::get();
            $productSize = ProductSizeModel::where('status', 1)->get();
            return view('frontend.pages.bookingpage', compact('cetegories', 'cities', 'zones', 'productSize'));
        } else {
            return redirect('/userlogin');
        }
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
        $companyName = Auth::guard('login')->user()->company_name;
        $storeName = explode(" ", $companyName);
        $prefix = "";
        foreach ($storeName as $value) {
            $prefix .= $value[0];
        }
        $upperPrefix = strtoupper($prefix);
        $latestID = BookingBaseModel::latest()->first()->id ?? 0;
        $mainOrderID = sprintf("%s-%06d", $upperPrefix, ++$latestID);
        $request['order_id'] = $mainOrderID;
        $request['store'] = $companyName;
        $request['product_type'] = 'Parcel';
        $resellerId = Auth::guard('login')->id();
        $booking_base = new BookingBaseModel();
        $request['date'] = date('Y-m-d');
        $request['reseller_id'] = $resellerId;
        $request['reseller_commission'] = 0;
        $dueAmount = $request->total_price - $request->paid_amount;
        $request['due_amount'] = $dueAmount;
        $booking_base->fill($request->all())->save();
        // $bookingDelivery = new BookingDeliveryModel();
        $request['booking_id'] = $booking_base->id;
        // $bookingDelivery->fill($request->all())->save();
        $recipent = new BookingRecipentModel();
        $recipent->fill($request->all())->save();

        $data = [];
        $totalCommission = 0;
        // $commissionGet = Product::whereIn('id', $request->product_id)->get()->toArray();
        foreach ($request->category_id as $key => $value) {
            $data[] = [
                "booking_id"    => $booking_base->id,
                "category_id"   => $value,
                "subcategory_id" => $request->subcategory_id[$key] ?? null,
                "product_size"  => isset($request->size[$key]) ? $request->size[$key] : null,
                "product_id"    => $request->product_id[$key],
                "quantity"      => $request->quantity[$key],
                "price"         => $request->price[$key],
            ];
            $productCommission = Product::findOrFail($request->product_id[$key])->reseller_commission;
            $totalCommission += $productCommission * $request->quantity[$key];
        }
        BookingProductModel::insert($data);



        // booking payment insert
        $null = 'Advance';
        if ($request->paid_amount > 0) {
            $payment[] = [
                "type" => $null,
                "invoice_id" => $booking_base->id,
                "reseller_id" => $resellerId,
                "amount" => $request->paid_amount,
                "date" => date('y-m-d'),
            ];
            BookingPaymentModel::insert($payment);
            // $resellerCommissionPay = new ResellerCommissionPayModel();
            // $resellerCommissionPay->invoice_id = $booking_base->id;
            // $resellerCommissionPay->date = date('y-m-d');
            // $resellerCommissionPay->amount = $request->paid_amount;
            // $resellerCommissionPay->reseller_id = $resellerId;
            // $resellerCommissionPay->created_by = $resellerId;
            // $resellerCommissionPay->save();
        }


        $resellerCommission = new ResellerCommissionModel();
        $resellerCommission->reseller_id = $resellerId;
        $resellerCommission->commission = $totalCommission;
        $resellerCommission->invoice_id = $mainOrderID;
        // $resellerCommission->paid = $request->paid_amount;
        // $resellerCommission->due = $totalCommission - $request->paid_amount;
        $resellerCommission->save();



        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
