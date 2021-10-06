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
                        <strong style="    font-size: x-small;line-height: 20px;">Booking Number:</strong>
                        <strong style="    font-size: x-small;line-height: 20px;" class="booking-number">{{$showData->id}}</strong>
                    </div>
                    <div class="col-md-6" style=" float: right;     margin-top: 3px;">
                        <strong style="    font-size: x-small;line-height: 20px;">Invoice Number:</strong>
                        <strong class="invoice-number" style="    font-size: x-small;line-height: 20px;">{{$showData->order_id}}</strong>
                    </div>
                </div>
                <hr style="margin-top: 3px; margin-bottom: 1px;">

                <div style="" class="row">


                    <div class="col-md-6" style="width: 50%;float: left;">
                        <h4 style="    font-size: small;line-height: 0px;">Reseller</h4>
                        <strong style="    font-size: x-small;line-height: 20px;">Company: </strong>
                        <span class="reseller_company" id="reseller_company" style="font-size: x-small;line-height: 20px;">{{$showData->reseller->company_name}}</span>
                        <br>
                        <strong style="    font-size: x-small;line-height: 20px;">Phone: </strong>
                        <span class="reseller_phone" id="reseller_phone" style="    font-size: x-small;line-height: 20px;">{{$showData->reseller->phone}}</span>
                    </div>


                    <div class="col-md-6" style="width: 50%;float: left;">
                        <div>
                            <h4 style="    font-size: small;line-height: 0px;">Recipent</h4>
                            <strong style="    font-size: x-small;line-height: 20px;">Name:</strong>
                            <span class="recipent_name" id="recipent_name" style="    font-size: x-small;line-height: 20px;">{{$showData->recipent->recipient_name}}</span>
                            <br>
                            <strong style="    font-size: x-small;line-height: 20px;">Phone: </strong>
                            <span class="recipent_phone" id="recipent_phone" style="    font-size: x-small;line-height: 20px;">{{$showData->recipent->recipient_phone}}</span>
                            <br>
                            <strong style="    font-size: x-small;line-height: 20px;">Address: </strong>
                            <span class="recipent_address" id="recipent_address" style="    font-size: x-small;line-height: 20px;">{{$showData->recipent->recipient_address}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-bordered" style="    font-size: x-small;line-height: 20px;display: table-cell;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="productdata" id="productdata">
                        @php $sl = 1; @endphp
                        @foreach($showData->product as $data)
                        <tr>
                            <td>{{$sl++}}</td>
                            <td id="category">{{$data->category->name}}</td>
                            <td id="name">{{$data->product->name}}</td>
                            <td id="quantity">{{$data->quantity}}</td>
                            <td id="quantity">{{$data->product->product_size}}</td>
                            <td id="sell_price">{{$data->product->sell_price}}</td>
                            <td id="total">{{$data->quantity * $data->product->sell_price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- amount details --}}
            <div class="row">
                <div class="col-sm-6 invoice-left" style="width: 50%;float: left;    text-align: center;>
                    <h4 style="    font-size: small;line-height: 20px;"><strong>Terms And Conditions</strong></h4>
                        <span style="font-size: x-small;line-height: 20px;" class="terms">{!! $terms->terms_and_conditions !!}</span>
                        <br>
                </div>
                <div class="col-sm-6 invoice-right" style="width: 50%;float: right;    text-align: center;">
                    <table class="table table-bordered"  style="    font-size: x-small;line-height: 20px;display: table-cell;">
                        <tr>
                            <td><strong>Delivery Fee: </strong></td>
                            <td><span class="delivery-fee" id="delivery-fee">{{$showData->delivery_price}}</span></td>
                        </tr>
                        <tr>
                            <td><strong>Total Amount: </strong></td>
                            <td><span class="total-amount" id="total-amount">{{$showData->total_price}}</span></td>
                        </tr>
                        <tr>
                            <td><strong>Paid Amount:</strong></td>
                            <td><span class="paid-amount" id="paid-amount">{{$showData->paid_amount}}</span></td>
                        </tr>
                        <tr>
                            <td><strong style="font-weight: 900; font-size: larger;">Due Amount: </strong></td>
                            <td><span class="due-amount" id="due-amount" style="font-weight: 900; font-size: larger;">{{$showData->due_amount}}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
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
            {{-- credit --}}
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
                        <strong style="    font-size: x-small;line-height: 20px;">Booking Number:</strong>
                        <strong style="    font-size: x-small;line-height: 20px;" class="booking-number">{{$showData->id}}</strong>
                    </div>
                    <div class="col-md-6" style=" float: right;     margin-top: 3px;">
                        <strong style="    font-size: x-small;line-height: 20px;">Invoice Number:</strong>
                        <strong class="invoice-number" style="    font-size: x-small;line-height: 20px;">{{$showData->order_id}}</strong>
                    </div>
                </div>
                <hr style="margin-top: 3px; margin-bottom: 1px;">

                <div style="" class="row">


                    <div class="col-md-6" style="width: 50%;float: left;">
                        <h4 style="    font-size: small;line-height: 0px;">Reseller</h4>
                        <strong style="    font-size: x-small;line-height: 20px;">Company: </strong>
                        <span class="reseller_company" id="reseller_company" style="font-size: x-small;line-height: 20px;">{{$showData->reseller->company_name}}</span>
                        <br>
                        <strong style="    font-size: x-small;line-height: 20px;">Phone: </strong>
                        <span class="reseller_phone" id="reseller_phone" style="    font-size: x-small;line-height: 20px;">{{$showData->reseller->phone}}</span>
                    </div>


                    <div class="col-md-6" style="width: 50%;float: left;">
                        <div>
                            <h4 style="    font-size: small;line-height: 0px;">Recipent</h4>
                            <strong style="    font-size: x-small;line-height: 20px;">Name:</strong>
                            <span class="recipent_name" id="recipent_name" style="    font-size: x-small;line-height: 20px;">{{$showData->recipent->recipient_name}}</span>
                            <br>
                            <strong style="    font-size: x-small;line-height: 20px;">Phone: </strong>
                            <span class="recipent_phone" id="recipent_phone" style="    font-size: x-small;line-height: 20px;">{{$showData->recipent->recipient_phone}}</span>
                            <br>
                            <strong style="    font-size: x-small;line-height: 20px;">Address: </strong>
                            <span class="recipent_address" id="recipent_address" style="    font-size: x-small;line-height: 20px;">{{$showData->recipent->recipient_address}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-bordered" style="    font-size: x-small;line-height: 20px;display: table-cell;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="productdata" id="productdata">
                        @php $sl = 1; @endphp
                        @foreach($showData->product as $data)
                        <tr>
                            <td>{{$sl++}}</td>
                            <td id="category">{{$data->category->name}}</td>
                            <td id="name">{{$data->product->name}}</td>
                            <td id="quantity">{{$data->quantity}}</td>
                            <td id="quantity">{{$data->product->product_size}}</td>
                            <td id="sell_price">{{$data->product->sell_price}}</td>
                            <td id="total">{{$data->quantity * $data->product->sell_price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- amount details --}}
            <div class="row">
                <div class="col-sm-6 invoice-left" style="width: 50%;float: left;    text-align: center;>
                    <h4 style="    font-size: small;line-height: 20px;"><strong>Terms And Conditions</strong></h4>
                        <span style="font-size: x-small;line-height: 20px;" class="terms">{!! $terms->terms_and_conditions !!}</span>
                        <br>
                </div>
                <div class="col-sm-6 invoice-right" style="width: 50%;float: right;    text-align: center;">
                    <table class="table table-bordered"  style="    font-size: x-small;line-height: 20px;display: table-cell;">
                        <tr>
                            <td><strong>Delivery Fee: </strong></td>
                            <td><span class="delivery-fee" id="delivery-fee">{{$showData->delivery_price}}</span></td>
                        </tr>
                        <tr>
                            <td><strong>Total Amount: </strong></td>
                            <td><span class="total-amount" id="total-amount">{{$showData->total_price}}</span></td>
                        </tr>
                        <tr>
                            <td><strong>Paid Amount:</strong></td>
                            <td><span class="paid-amount" id="paid-amount">{{$showData->paid_amount}}</span></td>
                        </tr>
                        <tr>
                            <td><strong style="font-weight: 900; font-size: larger;">Due Amount: </strong></td>
                            <td><span class="due-amount" id="due-amount" style="font-weight: 900; font-size: larger;">{{$showData->due_amount}}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
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
            {{-- credit --}}
        </div>
    </div>
</div>
</body>
</html>
