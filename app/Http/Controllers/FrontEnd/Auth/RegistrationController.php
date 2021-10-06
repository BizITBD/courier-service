<?php

namespace App\Http\Controllers\FrontEnd\Auth;

use App\Reseller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ResellerRequest;
use Illuminate\Notifications\Notification;
use App\Http\Requests\UserRegistrationRequest;
use App\Interests;
use App\MerchantInterest;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interests = Interests::where('status', 1)->get();
        $merchantInterests = MerchantInterest::where('status', 1)->get();
        return view('frontend.pages.registration', compact('interests', 'merchantInterests'));
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
    public function store(UserRegistrationRequest $request)
    {
        $reseller = new Reseller();
        $formData = $request->all();
        $formData['password'] = Hash::make($request->password);
        // $formData['type'] = 1;
        // $formData['interest'] = $request->input('interest');
        // dd($formData);
        $reseller->fill($formData)->save();
        $notification = [
            'message'     => 'Registration Completed Successfully',
            'alert-type'  => 'success',
        ];
        return redirect('/userlogin')->with($notification);
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
