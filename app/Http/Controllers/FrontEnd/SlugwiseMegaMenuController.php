<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\MegaMenu;
use Illuminate\Http\Request;

class SlugwiseMegaMenuController extends Controller
{
    public function index($slug)
    {
        $megaMenu = MegaMenu::where('slug', $slug)->first();
        return view('frontend.pages.mega-menu-services', compact('megaMenu'));
    }
}
