<?php

namespace App\Http\Controllers;

use App\MerchantBooking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lastMerchantBookings = MerchantBooking::with('Reseller', 'City')->limit(5)->get();
        // dd($lastMerchantBookings->toArray());
        return view('home', compact('lastMerchantBookings'));
    }
}
