<?php

namespace App\Http\Controllers;

use App\BookingBaseModel;
use App\BookingProductModel;
use App\CityModel;
use App\MerchantBooking;
use App\Product;
use App\Reseller;
use App\ResellerCommissionModel;

class DashBoardController extends Controller
{
    public function activeReseller()
    {
        $resellerData = Reseller::has('base')->withCount('base')
            ->get()
            ->sortByDesc('base_count')->take(7)->toArray();

        $data['label'] = array_column($resellerData, "name");
        $data['value'] = array_column($resellerData, "base_count");

        return response()->json($data);
    }
    public function popular()
    {
        // $abcd = BookingProductModel::where('product_id',null)->get();
        $productData = Product::has('most_product')->withCount('most_product')
            ->get()
            ->sortByDesc('most_product_count')->take(7)->toArray();
        // dd($productData);


        $data['label'] = array_column($productData, "name");

        $data['value'] = array_column($productData, "most_product_count");

        return response()->json($data);
    }

    public function mostDeliveredCity()
    {
        $cityData = CityModel::has('most_city')->withCount('most_city')
            ->get()->sortByDesc('most_city_count')->take(7)->toArray();
        // dd($cityData->toArray());


        $data['label'] = array_column($cityData, "city_name");

        $data['value'] = array_column($cityData, "most_city_count");

        return response()->json($data);
    }

    public function counter()
    {
        $data['resellerTotalCommissionDue'] = ResellerCommissionModel::get()->sum('due');


        $data['merchantTotalCommissionDue'] = MerchantBooking::get()->sum('due');

        $date = date('Y-m-d');

        $data['todayResellerBookings'] = BookingBaseModel::where('date', $date)->get()->count('booking_id');

        $data['todayMerchantBookings'] = MerchantBooking::where('date', $date)->get()->count('booking_id');

        return response()->json($data);
    }
    //to operate a collection $todayMerchantBookingsSum = collect($todayMerchantBookings)->count('booking_id');
}
