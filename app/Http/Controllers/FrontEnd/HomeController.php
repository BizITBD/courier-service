<?php

namespace App\Http\Controllers\FrontEnd;

use App\AboutUs;
use App\Http\Controllers\Controller;
use App\MegaMenu;
use App\OurServicesModel;

class HomeController extends Controller
{
    public function index()
    {
        $serviceData = OurServicesModel::where('status', 1)->get();
        $aboutUsData = AboutUs::where('status', 1)->get();
        return view('frontend.home', compact('serviceData', 'aboutUsData'));
    }
}
