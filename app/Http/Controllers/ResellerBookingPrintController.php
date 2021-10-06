<?php

namespace App\Http\Controllers;

use App\AppSettingsModel;
use App\BookingBaseModel;
use Illuminate\Http\Request;

class ResellerBookingPrintController extends Controller
{
    public function index($id)
    {
        $terms = AppSettingsModel::first();
        $showData = BookingBaseModel::with(['recipent', 'delivery', 'product', 'recipent.city', 'product.product', 'product.category', 'reseller'])->findOrFail($id);
        // dd($terms);
        return view('print', compact('showData', 'terms'));
    }
}
