@extends('frontend.layouts.app')
@section('frontendcontent')

<div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{Auth::guard('login')->user()->image ? '/' . Auth::guard('login')->user()->image : 'https://bootdey.com/img/Content/avatar/avatar7.png'}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{Auth::guard('login')->user()->name}}</h4>
                      <p class="text-muted font-size-sm">{{Auth::guard('login')->user()->company_name}}</p>
                      <strong>Payable Amount : <span>{{$payable}}</span></strong><br><br>
                      <a href="{{route('reseller_profile.edit',Auth::guard('login')->user()->id)}}"><button class="btn btn-info">Edit Profile</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  {{-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary">https://bootdey.com</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                    <span class="text-secondary">bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                    <span class="text-secondary">@bootdey</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary">bootdey</span>
                  </li> --}}
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary"><a href="//{{Auth::guard('login')->user()->fb_page_link}}">{{Auth::guard('login')->user()->fb_page_link}}</a></span>
                  </li>
                  <br>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addbankingModal">
                    <i class="fa fa-plus-square"></i>&nbsp&nbspTransaction Details(banking)</button>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addmobileModal">
                    <i class="fa fa-plus-square"></i>&nbsp&nbspTransaction Details(mobile)</button>
                  </li>
                </ul>
              </div><br>

              {{-- transaction details --}}
              {{-- <div class="card">
                <div class="card-body">
                  <div class="">
                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Banking Details</i></h6>
                    <strong>Mobile Banking Details :</strong>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Account Type :</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$mobileBnakingDetails ? $mobileBnakingDetails->account_type : "No Data Added"}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Account Number:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$mobileBnakingDetails ? $mobileBnakingDetails->mobile_number : "No Data Added"}}
                        </div>
                    </div>
                    <hr><br>
                    <strong>Banking Details :</strong>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Bank Name :</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$BnakingDetails ? $BnakingDetails->bank_name : "No Data Added"}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Account Number:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$BnakingDetails ? $BnakingDetails->account_number : "No Data Added"}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Account Holder Name :</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$BnakingDetails ? $BnakingDetails->accountant_name : "No Data Added"}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Branch Name: </h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$BnakingDetails ? $BnakingDetails->branch_name : "No Data Added"}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Routing Number: </h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$BnakingDetails ? $BnakingDetails->routing_number : "No Data Added"}}
                        </div>
                    </div>
                  </div>
                </div>
              </div> --}}


            </div>

            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{Auth::guard('login')->user()->name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{Auth::guard('login')->user()->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{Auth::guard('login')->user()->phone}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Company Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{Auth::guard('login')->user()->company_name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Interest</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @if(Auth::guard('login')->user()->type == 1)

                        @if($interest->reseller_interest)
                        @foreach($interest->reseller_interest as $interets)
                        {{$interets}}
                            @if(!$loop->last)
                            ,
                            @endif
                        @endforeach
                    @else
                        {{"No Data Provided"}}
                    @endif

                        @endif


                        @if(Auth::guard('login')->user()->type == 2)

                        @if($interest->merchant_interest)
                    @foreach($interest->merchant_interest as $interets)
                    {{$interets}}
                        @if(!$loop->last)
                        ,
                        @endif
                    @endforeach
                @else
                    {{"No Data Provided"}}
                @endif

                        @endif
                    </div>
                  </div>
                </div>
              </div>

                        {{-- transaction details --}}
              <div class="card">
                <div class="card-body">
                  <div class="">
                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Banking Details</i></h6>
                    <strong>Mobile Banking Details :</strong>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Account Type :</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$mobileBnakingDetails ? $mobileBnakingDetails->account_type : "No Data Added"}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Account Number:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$mobileBnakingDetails ? $mobileBnakingDetails->mobile_number : "No Data Added"}}
                        </div>
                    </div>
                    <hr><br>
                    <strong>Banking Details :</strong>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Bank Name :</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$BnakingDetails ? $BnakingDetails->bank_name : "No Data Added"}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Account Number:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$BnakingDetails ? $BnakingDetails->account_number : "No Data Added"}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Account Holder Name :</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$BnakingDetails ? $BnakingDetails->accountant_name : "No Data Added"}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Branch Name: </h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$BnakingDetails ? $BnakingDetails->branch_name : "No Data Added"}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <h6 class="mb-0">Routing Number: </h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$BnakingDetails ? $BnakingDetails->routing_number : "No Data Added"}}
                        </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
    </div>
{{-- bank modal --}}
    <div class="modal fade" id="addbankingModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Banking Details</h4>
                </div>
                <form method="POST" id="addform" action="/transaction">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <strong>For Banking :-</strong><br>
                            <label for="name">Enter Bank Name:</label>
                            <input class="form-control" placeholder="Your Bank Name" type="text" value="{{$BnakingDetails ? $BnakingDetails->bank_name : ''}}" name="bank_name" id="bank_name">
                            <label for="name">Enter Bank Account Number:</label>
                            <input class="form-control" placeholder="Your Bank account Number" type="text" value="{{$BnakingDetails ? $BnakingDetails->account_number : ''}}" name="account_number" id="account_number">
                            <label for="name">Accountant Name:</label>
                            <input class="form-control" placeholder="Enter Accountant Name" type="text" value="{{$BnakingDetails ? $BnakingDetails->accountant_name : ''}}" name="accountant_name" id="accountant_name">
                            <label for="name">Bank Branch Name:</label>
                            <input class="form-control" placeholder="Enter Bank Branch Name" type="text" value="{{$BnakingDetails ? $BnakingDetails->branch_name : ''}}" name="branch_name" id="branch_name">
                            <label for="name">Routing Number:</label>
                            <input class="form-control" placeholder="Enter routing number" value="{{$BnakingDetails ? $BnakingDetails->routing_number : ''}}" type="number  webkit-inner-spin-button" name="routing_number" id="routing_number">




                            <span class="text-danger"></span>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default add-close" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- mobile modal --}}
    <div class="modal fade" id="addmobileModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Banking Details</h4>
                </div>
                <form method="POST" id="addbankform" action="/transaction_mobile">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">

                            <strong>For Mobile Banking :-</strong><br>
                            <label for="name">Enter Account Number:*</label>
                            <input class="form-control" placeholder="Your Bkash or Rocket Number" value="{{$mobileBnakingDetails ? $mobileBnakingDetails->mobile_number : ''}}" type="text" name="mobile_number" id="mobile_number">
                            <label>select account type :-</label>
                            <select class="form-control" name="account_type">
                                <option value="bkash" {{($mobileBnakingDetails ? $mobileBnakingDetails->account_type : false) == 'bkash' ? 'selected' : ''}}>Bkash</option>
                                <option value="rocket" {{($mobileBnakingDetails ? $mobileBnakingDetails->account_type : false) == 'rocket' ? 'selected' : ''}}>Rocket</option>
                            </select>

                            <span class="text-danger"></span>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default add-close" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
    </style>
@endsection
