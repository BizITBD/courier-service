<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\TransactionBankModel;
use App\TransactionMobileModel;
use App\ResellerCommissionModel;
use App\Http\Controllers\Controller;
use App\Reseller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interest = Reseller::where('id', Auth::guard('login')->user()->id)->first();
        // dd($interest->toArray());

        // $total_commission = ResellerCommissionModel::where('reseller_id', Auth::guard('login')->user()->id)->sum('commission');

        $payable = ResellerCommissionModel::where('reseller_id', Auth::guard('login')->user()->id)->where('due', '>', 0)->sum('payable');

        $commission = ResellerCommissionModel::where('reseller_id', Auth::guard('login')->user()->id)->paginate(10);

        $mobileBnakingDetails = TransactionMobileModel::where('reseller_id', Auth::guard('login')->user()->id)->first();

        $BnakingDetails = TransactionBankModel::where('reseller_id', Auth::guard('login')->user()->id)->first();

        return view('frontend.pages.reselerprofile', compact('commission', 'mobileBnakingDetails', 'BnakingDetails', 'payable', 'interest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $profileData = Reseller::findOrFail($id);
        return view('frontend.pages.editprofile', compact('profileData'));
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
        $userModel = Reseller::findOrFail($id);
        $formData = $request->all();
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'reseller_' . Str::random(5) . '.' . $extension;
            $path = "frontend-assets/assets/img/resellers/";
            $request->file('image')->move($path, $name);

            $formData['image'] = $path . $name;
            // dd($form_data);
        }
        $userModel->fill($formData)->save();
        return redirect()->back();
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
