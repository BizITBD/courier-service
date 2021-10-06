@extends('frontend.layouts.app')
@section('frontendcontent')

<html>

    <head>
        <link rel="stylesheet" href="/frontend-assets/assets/css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />




      <title>Sign Up</title>
    </head>

    <body>
      <div class="main mainbox">

        <p class="sign" align="center">Sign Up</p>
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active sign" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Reseller Sign Up</a>
                <a class="nav-item nav-link sign" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Merchant Sign Up</a>
            </div>
        </nav>

        @if ($errors->any())
    <div class="alert alert-danger text-center">
        <ul>
            @foreach ($errors->all() as $error)
                <li>*{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <form class="form1" action="{{url('/userregistration')}}" method="POST">
                @csrf
              <input class="un width color" type="text" align="center" placeholder="Enter Name" name="name">
              <input class="un width color" type="text" align="center" placeholder="Enter Phone Number" name="phone">
              <input class="un width color" type="text" align="center" placeholder="Enter Company Name" name="company_name">
              <input class="un width color" type="text" align="center" placeholder="Enter Facebook Page Link" name="fb_page_link">
              <input type="hidden" name="type" value="1">
              <input class="un width color" type="email" align="center" placeholder="Enter Email Address" name="email">


              <div class="form-group checkbox vaues">
                <label><strong>Select Your Interest :</strong></label><br>

                                <select class="selectpicker vaues un width color" multiple data-live-search="true" name="reseller_interest[]">
                            @foreach($interests as $data)
                                    <option value="{{$data->name}}">{{$data->name}}</option>
                            @endforeach
                                </select>

              </div><hr>



              <input class="pass width" type="password" align="center" placeholder="Enter Your Password" name="password" style="background: #fe7f0147;">
              <button class="submit signup" type="submit" align="center">Sign Up</button>
            </form>
        </div>



        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <form class="form1" action="{{url('/merchant_login')}}" method="POST">
                @csrf
              <input class="un width color" type="text" align="center" placeholder="Enter Name" name="name">
              <input class="un width color" type="text" align="center" placeholder="Enter Phone Number" name="phone">
              <input class="un width color" type="text" align="center" placeholder="Enter Company Name" name="company_name">
              <input class="un width color" type="text" align="center" placeholder="Enter Facebook Page Link" name="fb_page_link">
              <input class="un width color" type="text" align="center" placeholder="Enter Trade Licence" name="trade_licence">
              <input class="un width color" type="email" align="center" placeholder="Enter Email Address" name="email">
              <input type="hidden" name="type" value="2">
              <div class="form-group checkbox vaues">
                <label><strong>Select Your Interest :</strong></label><br>

                                <select class="selectpicker vaues un width color" multiple data-live-search="true" name="merchant_interest[]">
                            @foreach($merchantInterests as $data)
                                    <option value="{{$data->name}}">{{$data->name}}</option>
                            @endforeach
                                </select>


              </div><hr>
              <input class="pass width color" type="password" align="center" placeholder="Enter Your Password" name="password">
              <button class="submit signup" type="submit" align="center">Sign Up</button>
            </form>
        </div>
    </div>

        </div>

    </body>

    </html>






    <style>
        .color{
            background: #fe7f0147;
        }
        .mainbox{
      background-color: #ffffff;
      width: 556px;
      height: 830px;
      margin: 7em auto;
      border-radius: 1.5em;
      box-shadow: 0px 11px 35px 2px rgb(0 0 0 / 14%);
        }
        .width{
            margin-left: 67px;
        }
        .signup{
            margin-left: 219px;
        }
        .sign {
    padding-top: 10px;
    color: #fe7f01;
    font-family: "Ubuntu", sans-serif;
    font-weight: bold;
    font-size: 15px;
}
.checkbox{
    text-align: center;
}
.vaues{
    font-size: large;
    font-weight: bold;
}
    </style>
    @endsection


    @section('script')
    <script type="text/javascript">
      $('select').selectpicker();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    @endsection
