<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="/assets/css/print_page.css" type="text/css"/>
    <style>
            .float-container {
                padding: 20px;
            }

            .float-child {
                width: 50%;
                float: left;
                padding: 20px;
            }
    </style>
</head>
<body style="margin-top: -41px;">
    {{-- <pre>@php
    print_r($infoData->invoiceInfo);
    exit();
    @endphp
    </pre> --}}
<div style="">
    <div class="float-container">
        <div style="width: min-content; float: left; " class="float-child">
            <div>
                <div style="">
                    <div style="width: 20%;float: left;">
                        <img src="{{$appsetting->company_logo ? '/' . $appsetting->company_logo : '/frontend-assets/assets/img/logo.png'}}" class="img-fluid" style="border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 61px;MARGIN-TOP: 6PX;" alt="logo"
                            style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 85px;">
                    </div>
                    <div style="width: 80%;float: left;">
                        <center>
                            <h4 style="    line-height: 0px;">Daily</h4>
                            <span style="    font-size: x-small;line-height: 20px;">Corporate Office: 202,House 16,road-06,block-F</span><br>
                            <span style="    font-size: x-small;line-height: 20px;">Mirpur-1,Dhaka-1216</span><br>
                            <span style="    font-size: x-small;line-height: 20px;">Contact : 01301954200</span><br>
                            <strong style="    font-size: x-small;">Website :<span>dailycourier247.com</span></strong><br>
                            {{-- <div style="float: right; margin-top: 21px;"><strong style="    font-size: x-small;line-height: 20px;">Invoice Number:
                                </strong><strong class="invoice-number" style="font-size: x-small;line-height: 20px;">{{$showData->id}}</strong></div>
                            <hr> --}}
                        </center>
                    </div>
                </div>

                <div class="row" >
                    <div class="col-md-6" style="float: left;     margin-top: 3px;">
                        <strong style="    font-size: x-small;line-height: 20px;">Invoice Number:</strong>
                        <strong style="    font-size: x-small;line-height: 20px;" class="booking-number">{{$infoData->id}}</strong>
                    </div>
                    <div class="col-md-6" style=" float: right;     margin-top: 3px;">
                        {{-- <strong style="    font-size: x-small;line-height: 20px;">Invoice Number:</strong>
                        <strong class="invoice-number" style="    font-size: x-small;line-height: 20px;">{{$infoData->order_id}}</strong> --}}
                    </div>
                </div>
                <hr style="margin-top: 3px; margin-bottom: 1px;">

                <div style="" class="row">


                    <div class="col-md-6" style="width: 50%;float: left;">
                        <h4 style="    font-size: small;line-height: 0px;">Reseller Details</h4>
                        <strong style="    font-size: x-small;line-height: 20px;">Company: </strong>
                        <span class="reseller_company" id="reseller_company" style="font-size: x-small;line-height: 20px;">{{$infoData->reseller->company_name}}</span>
                        <br>
                        <strong style="    font-size: x-small;line-height: 20px;">Phone: </strong>
                        <span class="reseller_phone" id="reseller_phone" style="    font-size: x-small;line-height: 20px;">{{$infoData->reseller->phone}}</span>
                    </div>


                    <div class="col-md-6" style="width: 50%;float: left;">
                        <div>
                            <h4 style="    font-size: small;line-height: 0px;">Paid By</h4>
                            <strong style="    font-size: x-small;line-height: 20px;">Name:</strong>
                            <span class="recipent_name" id="recipent_name" style="    font-size: x-small;line-height: 20px;">{{$infoData->paidby ? $infoData->paidby->name : 'no data'}}</span>
                            <br>
                            <strong style="    font-size: x-small;line-height: 20px;">Date: </strong>
                            <span class="recipent_phone" id="recipent_phone" style="    font-size: x-small;line-height: 20px;">{{$infoData->date}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-bordered" style="    font-size: x-small;line-height: 20px;display: table-cell;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Booking Number</th>
                            <th>Paid Via</th>
                            <th>Amount Paid</th>
                        </tr>
                    </thead>
                    <tbody class="productdata" id="productdata">
                        @php $sl = 1; @endphp
                        @foreach($infoData->invoiceInfo as $data)
                        <tr>
                            <td>{{$sl++}}</td>
                            <td id="category">{{$data->date}}</td>
                            <td id="name">{{$data->invoice_id}}</td>
                            <td id="quantity">{{$data->transaction_type == 1 ? 'Bank' : 'Mobile'}}</td>
                            <td id="quantity">{{$data->amount}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td>Total Amount Paid : </td>
                            <td class="total-paid">{{$infoData->total_Amount}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row" style="style=">
                <div class="col-md-6"  style="width: 50%;float: left;    text-align: center;">
                    <hr>
                    <span style="    font-size: x-small;line-height: 20px;" class="text-center">Receiver Signature</span>
                </div>
                <div  class="col-md-6"  style="width: 50%;float: left;    text-align: center;">
                    <hr>
                    <span style="    font-size: x-small;line-height: 20px;" class="text-center">Authorized Signature</span>
                </div>
            </div>
        </div>
        <div style="width: min-content; float: left; " class="float-child">
            <div>
                <div style="">
                    <div style="width: 20%;float: left;">
                        <img src="{{$appsetting->company_logo ? '/' . $appsetting->company_logo : '/frontend-assets/assets/img/logo.png'}}" class="img-fluid" style="border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 61px;MARGIN-TOP: 6PX;" alt="logo"
                            style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 85px;">
                    </div>
                    <div style="width: 80%;float: left;">
                        <center>
                            <h4 style="    line-height: 0px;">Daily</h4>
                            <span style="    font-size: x-small;line-height: 20px;">Corporate Office: 202,House 16,road-06,block-F</span><br>
                            <span style="    font-size: x-small;line-height: 20px;">Mirpur-1,Dhaka-1216</span><br>
                            <span style="    font-size: x-small;line-height: 20px;">Contact : 01301954200</span><br>
                            <strong style="    font-size: x-small;">Website :<span>dailycourier247.com</span></strong><br>
                            {{-- <div style="float: right; margin-top: 21px;"><strong style="    font-size: x-small;line-height: 20px;">Invoice Number:
                                </strong><strong class="invoice-number" style="font-size: x-small;line-height: 20px;">{{$showData->id}}</strong></div>
                            <hr> --}}
                        </center>
                    </div>
                </div>

                <div class="row" >
                    <div class="col-md-6" style="float: left;     margin-top: 3px;">
                        <strong style="    font-size: x-small;line-height: 20px;">Invoice Number:</strong>
                        <strong style="    font-size: x-small;line-height: 20px;" class="booking-number">{{$infoData->id}}</strong>
                    </div>
                    <div class="col-md-6" style=" float: right;     margin-top: 3px;">
                        {{-- <strong style="    font-size: x-small;line-height: 20px;">Invoice Number:</strong>
                        <strong class="invoice-number" style="    font-size: x-small;line-height: 20px;">{{$infoData->order_id}}</strong> --}}
                    </div>
                </div>
                <hr style="margin-top: 3px; margin-bottom: 1px;">

                <div style="" class="row">


                    <div class="col-md-6" style="width: 50%;float: left;">
                        <h4 style="    font-size: small;line-height: 0px;">Reseller Details</h4>
                        <strong style="    font-size: x-small;line-height: 20px;">Company: </strong>
                        <span class="reseller_company" id="reseller_company" style="font-size: x-small;line-height: 20px;">{{$infoData->reseller->company_name}}</span>
                        <br>
                        <strong style="    font-size: x-small;line-height: 20px;">Phone: </strong>
                        <span class="reseller_phone" id="reseller_phone" style="    font-size: x-small;line-height: 20px;">{{$infoData->reseller->phone}}</span>
                    </div>


                    <div class="col-md-6" style="width: 50%;float: left;">
                        <div>
                            <h4 style="    font-size: small;line-height: 0px;">Paid By</h4>
                            <strong style="    font-size: x-small;line-height: 20px;">Name:</strong>
                            <span class="recipent_name" id="recipent_name" style="    font-size: x-small;line-height: 20px;">{{$infoData->paidby ? $infoData->paidby->name : 'no data'}}</span>
                            <br>
                            <strong style="    font-size: x-small;line-height: 20px;">Date: </strong>
                            <span class="recipent_phone" id="recipent_phone" style="    font-size: x-small;line-height: 20px;">{{$infoData->date}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-bordered" style="    font-size: x-small;line-height: 20px;display: table-cell;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Booking Number</th>
                            <th>Paid Via</th>
                            <th>Amount Paid</th>
                        </tr>
                    </thead>
                    <tbody class="productdata" id="productdata">
                        @php $sl = 1; @endphp
                        @foreach($infoData->invoiceInfo as $data)
                        <tr>
                            <td>{{$sl++}}</td>
                            <td id="category">{{$data->date}}</td>
                            <td id="name">{{$data->invoice_id}}</td>
                            <td id="quantity">{{$data->transaction_type == 1 ? 'Bank' : 'Mobile'}}</td>
                            <td id="quantity">{{$data->amount}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td>Total Amount Paid : </td>
                            <td class="total-paid">{{$infoData->total_Amount}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row" style="style=">
                <div class="col-md-4"  style="width: 50%;float: left;    text-align: center;">
                    <hr>
                    <span style="    font-size: x-small;line-height: 20px;" class="text-center">Receiver Signature</span>
                </div>
                <div  class="col-md-4"  style="width: 50%;float: left;    text-align: center;">
                    <hr>
                    <span style="    font-size: x-small;line-height: 20px;" class="text-center">Authorized Signature</span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
