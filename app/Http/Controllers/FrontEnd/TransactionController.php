<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\TransactionBankModel;
use App\Http\Controllers\Controller;
use App\TransactionMobileModel;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $transactionBank = TransactionBankModel::where('id', 1)->first();
        $transactionBank['reseller_id'] = Auth::guard('login')->id();
        $bankInfo = $request->all();
        $transactionBank->fill($bankInfo)->save();


        return redirect()->back();
    }
    public function mobile(Request $request)
    {
        $transactionmobile = TransactionMobileModel::where('id', 1)->first();
        $transactionmobile['reseller_id'] = Auth::guard('login')->id();
        $mobileInfo = $request->all();
        $transactionmobile->fill($mobileInfo)->save();
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
