@extends('layouts.app')
@section('content')
    <h3>Delivery Details</h3>
    <br />
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-options" style="margin-top: 1%;margin-bottom:1%">
                <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2" method="get" action="/country">
                    <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search" name="search"
                        value="{{ request()->query('search') }}">
                    <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
        <div style="overflow: auto">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">store</th>
                        <th class="text-center">Order Id</th>
                        <th class="text-center">Reseller</th>
                        <th class="text-center">Delivery Price</th>
                        <th class="text-center">Product Price</th>
                        <th class="text-center">Total Price</th>
                        <th class="text-center">Advance Paid</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=1; @endphp
                    @foreach ($bookingData as $data)
                        <tr>
                            <td class="text-center">{{ $sl++ }}</td>
                            <td class="text-center">{{ $data->date }}
                            <td class="text-center">{{ $data->store }}</td>
                            <td class="text-center">{{ $data->order_id }}</td>
                            <td class="text-center">{{ $data->reseller ? $data->reseller->name : '' }}</td>
                            <td class="text-center">{{ $data->delivery_price }}</td>
                            <td class="text-center">{{ $data->product_price }}</td>
                            <td class="text-center">{{ $data->total_price }}</td>
                            <td class="text-center">{{ $data->paid_amount ? $data->paid_amount : '0' }}</td>
                            <td class="text-center">
                                <div class='label @if ($data->status == 1) label-primary @elseif($data->status==2) label-success @elseif($data->status==3) label-default
                                    @elseif($data->status==4) label-info @else label-danger @endif'>
                                    @if ($data->status == 1) pending
                                    @elseif($data->status==2) delevered
                                    @elseif($data->status==3) Returned
                                    @elseif($data->status==4) In Transit
                                    @elseif($data->status==5) Rejceted @endif
                                </div>
                            </td>
                {{-- status --}}
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="entypo-shareable"></i> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/admin/delivery_details/status/{{ $data->id }}?status=1">Pending</a>
                            </li>
                            <li><a href="/admin/delivery_details/status/{{ $data->id }}?status=2">delevered</a>
                            </li>
                            <li><a href="/admin/delivery_details/status/{{ $data->id }}?status=3">Returned</a>
                            </li>
                            <li><a href="/admin/delivery_details/status/{{ $data->id }}?status=4">Transit</a>
                            </li>
                            <li><a href="/admin/delivery_details/status/{{ $data->id }}?status=5">Rejceted</a>
                            </li>
                        </ul>
                    </div>
                    {{-- delete --}}
                    <form method="post" action="{{ Route('delivery_details.destroy', $data->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-xs btn-danger" id="delete" type="submit" data=""><i class="entypo-trash"></i></button>
                    </form>
                    {{-- view --}}
                    <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#view-moadal" id="view"
                        onclick=showData({{ $data->id }})> <i class="entypo-eye"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
<div class="d-inline-flex"><strong>Go To Page -</strong>{{ $bookingData->links() }}</div>
<!-- Modal -->
<div class="modal fade" id="view-moadal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=modalClose()>
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="print">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{$appsetting->company_logo ? '/' . $appsetting->company_logo : '/frontend-assets/assets/img/logo.png'}}" alt="logo"
                                    style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 85px;">
                            </div>
                            <div class="col-md-9">
                                <center>
                                    <h3>Daily</h3>
                                    <span>Corporate Office: 202,House 16,road-06,block-F</span><br>
                                    <span>Mirpur-1,Dhaka-1216</span><br>
                                    <span>Contact : 01301954200</span><br>
                                    <strong>Website :<span>dailycourier247.com</span></strong><br>
                                    {{-- <div class="row" >
                                        <div class="col-md-6" style="float: left; margin-top: 21px;">
                                            <strong>Booking Number:</strong>
                                            <strong class="booking-number"></strong>
                                        </div>
                                        <div class="col-md-6" style="float: right; margin-top: 21px;">
                                            <strong>Invoice Number:</strong>
                                            <p class="invoice-number"></p>
                                        </div>
                                    </div>
                                    <hr> --}}
                                </center>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-6" style="float: left; margin-top: 21px;">
                                <strong>Booking Number:</strong>
                                <strong class="booking-number"></strong>
                            </div>
                            <div class="col-md-6" style=" float: right; margin-top: 21px;">
                                <strong>Invoice Number:</strong>
                                <strong class="invoice-number"></strong>
                            </div>
                        </div>
                        <hr>

                        <div class="row">


                            <div class="col-md-6">
                                <h4>Reseller</h4>
                                <strong>Company: </strong>
                                <span class="reseller_company" id="reseller_company"></span>
                                <br>
                                <strong>Phone: </strong>
                                <span class="reseller_phone" id="reseller_phone"></span>
                            </div>


                            <div class="col-md-6">
                                <div>
                                    <h4>Recipent</h4>
                                    <strong>Name:</strong>
                                    <span class="recipent_name" id="recipent_name"></span>
                                    <br>
                                    <strong>Phone: </strong>
                                    <span class="recipent_phone" id="recipent_phone"></span>
                                    <br>
                                    <strong>Address: </strong>
                                    <span class="recipent_address" id="recipent_address"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div><br><br></div>
                    <div>
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Product Category</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Sell Price</th>
                                    <th class="text-center">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="productdata" id="productdata">
                            </tbody>
                        </table>
                    </div>
                    {{-- amount details --}}
                    <div class="row">
                        <div class="col-sm-6 invoice-left">
                            <h4><strong>Terms And Conditions</strong></h4>
                                <span class="terms"></span>
                                <br>
                        </div>
                        <div class="col-sm-6 invoice-right" style="float:right">
                            <table class="table table-bordered">
                                <tr>
                                    <td><strong>Delivery Fee: </strong></td>
                                    <td><span class="delivery-fee" id="delivery-fee"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Total Amount: </strong></td>
                                    <td><span class="total-amount" id="total-amount"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Paid Amount:</strong></td>
                                    <td><span class="paid-amount" id="paid-amount"></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="font-weight: 900; font-size: larger;">Due Amount: </strong></td>
                                    <td><span class="due-amount" id="due-amount" style="font-weight: 900; font-size: larger;"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                        <div class="row">
                            <div class="col-md-4">
                                <hr>
                                <span class="text-center">Receiver Signature</span>
                            </div>
                            <div class="col-md-4"></div>
                            <div  class="col-md-4">
                                <hr>
                                <span class="text-center">Authorized Signature</span>
                            </div>
                        </div>
                    {{-- credit --}}
                </div>
                <div class="col-md-6">
                    <div>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{$appsetting->company_logo ? '/' . $appsetting->company_logo : '/frontend-assets/assets/img/logo.png'}}" alt="logo"
                                    style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 85px;">
                            </div>
                            <div class="col-md-9">
                                <center>
                                    <h3>Daily</h3>
                                    <span>Corporate Office: 202,House 16,road-06,block-F</span><br>
                                    <span>Mirpur-1,Dhaka-1216</span><br>
                                    <span>Contact : 01301954200</span><br>
                                    <strong>Website :<span>dailycourier247.com</span></strong><br>
                                    {{-- <div class="row" >
                                        <div class="col-md-6" style="float: left; margin-top: 21px;">
                                            <strong>Booking Number:</strong>
                                            <strong class="booking-number"></strong>
                                        </div>
                                        <div class="col-md-6" style="float: right; margin-top: 21px;">
                                            <strong>Invoice Number:</strong>
                                            <p class="invoice-number"></p>
                                        </div>
                                    </div>
                                    <hr> --}}
                                </center>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-md-6" style="float: left; margin-top: 21px;">
                                <strong>Booking Number:</strong>
                                <strong class="booking-number"></strong>
                            </div>
                            <div class="col-md-6" style=" float: right; margin-top: 21px;">
                                <strong>Invoice Number:</strong>
                                <strong class="invoice-number"></strong>
                            </div>
                        </div>
                        <hr>

                        <div class="row">


                            <div class="col-md-6">
                                <h4>Reseller</h4>
                                <strong>Company: </strong>
                                <span class="reseller_company" id="reseller_company"></span>
                                <br>
                                <strong>Phone: </strong>
                                <span class="reseller_phone" id="reseller_phone"></span>
                            </div>


                            <div class="col-md-6">
                                <div>
                                    <h4>Recipent</h4>
                                    <strong>Name:</strong>
                                    <span class="recipent_name" id="recipent_name"></span>
                                    <br>
                                    <strong>Phone: </strong>
                                    <span class="recipent_phone" id="recipent_phone"></span>
                                    <br>
                                    <strong>Address: </strong>
                                    <span class="recipent_address" id="recipent_address"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div><br><br></div>
                    <div>
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Product Category</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Sell Price</th>
                                    <th class="text-center">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="productdata" id="productdata">
                            </tbody>
                        </table>
                    </div>
                    {{-- amount details --}}
                    <div class="row">
                        <div class="col-sm-6 invoice-left">
                            <h4><strong>Terms And Conditions</strong></h4>
                                <span class="terms"></span>
                                <br>
                        </div>
                        <div class="col-sm-6 invoice-right" style="float:right">
                            <table class="table table-bordered">
                                <tr>
                                    <td><strong>Delivery Fee: </strong></td>
                                    <td><span class="delivery-fee" id="delivery-fee"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Total Amount: </strong></td>
                                    <td><span class="total-amount" id="total-amount"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Paid Amount:</strong></td>
                                    <td><span class="paid-amount" id="paid-amount"></span></td>
                                </tr>
                                <tr>
                                    <td><strong style="font-weight: 900; font-size: larger;">Due Amount: </strong></td>
                                    <td><span class="due-amount" id="due-amount" style="font-weight: 900; font-size: larger;"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                        <div class="row">
                            <div class="col-md-4">
                                <hr>
                                <span class="text-center">Receiver Signature</span>
                            </div>
                            <div class="col-md-4"></div>
                            <div  class="col-md-4">
                                <hr>
                                <span class="text-center">Authorized Signature</span>
                            </div>
                        </div>
                    {{-- credit --}}
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-info btn-icon icon-left hidden-print print print-button" id="print">
                POS Print <i class="entypo-doc-text"></i></a>
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick=modalClose()><i
                    class="fas fa-check"></i>&nbspOK</button>
        </div>
    </div>
</div>
</div>
<center></center>
@endsection
@section('script')
<script type="text/javascript">
function showData(id) {
    let url = "delivery_details/" + id;
    $(".print-button").attr('href',"/admin/printex/"+id)
    $.ajax({
        type: "get",
        url: url,
        data: "data",
        dataType: "json",
        success: function(response) {
            var due = response.total_price - response.paid_amount;
            $(".recipent_name").text(response.recipent.recipient_name)
            $(".recipent_phone").text(response.recipent.recipient_phone)
            $(".recipent_address").text(response.recipent.recipient_address)
            $(".due-amount").text(due ? due : 0)
            $(".paid-amount").text(response.paid_amount ? response.paid_amount : 0)
            $(".invoice-number").text(response.id)
            $(".booking-number").text(response.order_id)
            // $("#delivery_name").text(response.delivery.delivery_name)
            // $("#delivery_phone").text(response.delivery.delivery_phone)
            $(".delivery-fee").text(response.delivery_price)
            $(".total-amount").text(response.total_price)
            $(".delivery-city").text(response.recipent.city ? response.recipent.city.city_name :
                'Not Set')
            $(".reseller_name").text(response.reseller.name)
            $(".reseller_company").text(response.reseller.company_name)
            $(".reseller_phone").text(response.reseller.phone)
            let html = "";
            let i = 1;
            response.product.forEach(element => {
                html += `<tr>
                <td class="text-center">${i++}</td>
                <td class="text-center" id="category">${element.category.name}</td>
                <td class="text-center" id="name">${element.product.name}</td>
                <td class="text-center" id="quantity">${element.quantity}</td>
                <td class="text-center" id="quantity">${element.product_size}</td>
                <td class="text-center" id="sell_price">${element.price}</td>
                <td class="text-center" id="total">${element.quantity*element.price}</td>
                </tr>`
            });
            $(".productdata").html(html);
        }
    });
    $.ajax({
        type: "get",
        url: "/admin/app_settings/1",
        dataType: "json",
        success: function (response) {
            console.log(response);
            $(".terms").html(response.terms_and_conditions);
        }
    });
}

function clearData() {
    $("#productdata").trigger("reset");
}

function modalClose() {
    $("#view-moadal").modal('hide');

}

</script>


<script>
    $('.print').click(function (e) {
        e.preventDefault();

        var url = $(this).attr('href');

        printPage(url);
    });

    function closePrint() {
        document.body.removeChild(this.__container__);
    }

    function setPrint() {
        this.contentWindow.__container__ = this;
        this.contentWindow.onbeforeunload = closePrint;
        this.contentWindow.onafterprint = closePrint;
        this.contentWindow.focus(); // Required for IE
        this.contentWindow.print();
    }

    function printPage(sURL) {
        var oHiddFrame = document.createElement("iframe");
        oHiddFrame.onload = setPrint;
        oHiddFrame.style.visibility = "hidden";
        oHiddFrame.style.position = "fixed";
        oHiddFrame.style.right = "0";
        oHiddFrame.style.bottom = "0";
        oHiddFrame.src = sURL;
        document.body.appendChild(oHiddFrame);
    }
    </script>

@endsection
