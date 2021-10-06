<?php

namespace App\Http\Controllers\FrontEnd\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('login')->check()) {
            // return redirect()->to('/merchant_dashboard');
            if (Auth::guard('login')->user()->type == 1) {
                return redirect()->to('/reseller_dashboard');
            } else {
                return redirect()->to('/merchant_dashboard');
            }
        } else {
            return view('frontend.pages.loginpage');
        }
    }

    public function login(Request $request)
    {
        $credentials = [
            'email'    => $request->input('email'),
            'password' => $request->input('password')
        ];
        if (Auth::guard('login')->attempt($credentials)) {
            $notification = [
                'message'    => 'logged in successfully',
                'alert-type' => 'success',
            ];

            if (Auth::guard('login')->user()->type == 1) {
                return Redirect("/reseller_dashboard")->with($notification);
            } else {
                return Redirect("/merchant_dashboard")->with($notification);
            }
        } else {
            $notification = [
                'message'    => 'login failed',
                'alert-type' => 'warning',
            ];
            return Redirect('/userlogin')->with($notification);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('login')->logout();
        $notification = [
            'message'    => 'logged out successfully',
            'alert-type' => 'success',
        ];
        return redirect('/userlogin')->with($notification);
    }
}
