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
                        <th class="text-center">SL</th>
                        <th class="text-center">Reseller Name</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Total Amount</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=1; @endphp
                    @foreach($paymentHistory as $data)
                    <tr>
                        <td class="text-center">{{$sl++}}</td>
                        <td class="text-center">{{$data->reseller->name}}</td>
                        <td class="text-center">{{$data->date}}</td>
                        <td class="text-center">{{$data->total_Amount}}</td>
                        <td class="text-center">
                            <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#view-moadal" id="view"
                            onclick=showData({{$data->id}})> <i class="entypo-eye"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
</table>
</div>
{{-- <div class="d-inline-flex"><strong>Go To Page -</strong>{{ $bookingList->links() }}</div> --}}


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
                                    <img src="{{$appsetting->company_logo ? '/' . $appsetting->company_logo : '/frontend-assets/assets/img/logo.png'}}" class="img-fluid" alt="logo"
                                        style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 85px;">
                                </div>
                                <div class="col-md-9">
                                    <center>
                                        <h3>Daily</h3>
                                        <span>Corporate Office: 202,House 16,road-06,block-F</span><br>
                                        <span>Mirpur-1,Dhaka-1216</span><br>
                                        <span>Contact : 01301954200</span><br>
                                        <strong>Website :<span>dailycourier247.com</span></strong><br>
                                        <div class="row">
                                            {{-- <div style="float: left; margin-top: 21px;"><strong>Booking Number:
                                            </strong><strong class="invoice-id"></strong>
                                            </div> --}}


                                            <div style="float: right; margin-top: 21px;"><strong>Invoice Number:
                                                </strong><strong class="invoice-number"></strong>
                                            </div>
                                        </div>
                                        <hr>
                                    </center>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md-6">
                                    <h4>Merchant Detais</h4>
                                    <strong>Company: </strong>
                                    <span class="reseller_company" id="reseller_company"></span>
                                    <br>
                                    <strong>Phone: </strong>
                                    <span class="reseller_phone" id="reseller_phone"></span>
                                </div>


                                <div class="col-md-6">
                                    <div>
                                        <h4>Paid By</h4>
                                        <strong>Name:</strong>
                                        <span class="recipent_name" id="recipent_name"></span>
                                        <br>
                                        <strong>Date: </strong>
                                        <span class="recipent_phone" id="recipent_phone"></span>
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
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Invoice Number</th>
                                        <th class="text-center">Paid Via</th>
                                        <th class="text-center">Amount Paid</th>
                                    </tr>
                                </thead>
                                <tbody class="productdata" id="productdata">
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Total Amount Paid : </td>
                                        <td class="total-paid"></td>
                                    </tr>
                                </tbody>
                            </table>
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
                    </div>
                    <div class="col-md-6">
                        <div>
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{$appsetting->company_logo ? '/' . $appsetting->company_logo : '/frontend-assets/assets/img/logo.png'}}" class="img-fluid" alt="logo"
                                        style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 85px;">
                                </div>
                                <div class="col-md-9">
                                    <center>
                                        <h3>Daily</h3>
                                        <span>Corporate Office: 202,House 16,road-06,block-F</span><br>
                                        <span>Mirpur-1,Dhaka-1216</span><br>
                                        <span>Contact : 01301954200</span><br>
                                        <strong>Website :<span>dailycourier247.com</span></strong><br>
                                        <div class="row">
                                            {{-- <div style="float: left; margin-top: 21px;"><strong>Booking Number:
                                            </strong><strong class="invoice-id"></strong>
                                            </div> --}}


                                            <div style="float: right; margin-top: 21px;"><strong>Invoice Number:
                                                </strong><strong class="invoice-number"></strong>
                                            </div>
                                        </div>
                                        <hr>
                                    </center>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md-6">
                                    <h4>Merchant Detais</h4>
                                    <strong>Company: </strong>
                                    <span class="reseller_company" id="reseller_company"></span>
                                    <br>
                                    <strong>Phone: </strong>
                                    <span class="reseller_phone" id="reseller_phone"></span>
                                </div>


                                <div class="col-md-6">
                                    <div>
                                        <h4>Paid By</h4>
                                        <strong>Name:</strong>
                                        <span class="recipent_name" id="recipent_name"></span>
                                        <br>
                                        <strong>Date: </strong>
                                        <span class="recipent_phone" id="recipent_phone"></span>
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
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Invoice Number</th>
                                        <th class="text-center">Paid Via</th>
                                        <th class="text-center">Amount Paid</th>
                                    </tr>
                                </thead>
                                <tbody class="productdata" id="productdata">
                                </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Total Amount Paid : </td>
                                        <td class="total-paid"></td>
                                    </tr>
                                </tbody>
                            </table>
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
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-info btn-icon icon-left hidden-print print print-id" id="print">
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
    // let id = $("#view").val()
    console.log(id)
    let url = "/admin/merchant-payment-history/" + id;
    $(".print-id").attr('href',"/admin/merchant-payment/history-print/"+id)
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function(response) {
            console.log(response)
            $(".recipent_name").text(response.created_by.name)
            $(".recipent_phone").text(response.date)
            $(".invoice-number").text(response.id)
            // $(".invoice-id").text(response[0].invoice_id)
            // // // $("#delivery_name").text(response.merchantBooking.delivery.delivery_name)
            // // // $("#delivery_phone").text(response.merchantBooking.delivery.delivery_phone)
            // $(".delivery-fee").text(response.merchantBooking.charges)
            // $(".total-amount").text(response.merchantBooking.cashto_collect)
            // // $(".delivery-city").text(response.merchantBooking.recipent.city ? response.merchantBooking.recipent.city.city_name :
            // //     'Not Set')
            // $(".reseller_name").text(response.reseller.company_name)
            $(".reseller_company").text(response.reseller.company_name)
            $(".reseller_phone").text(response.reseller.phone)
            $(".total-paid").text(response.total_Amount)
            // $(".terms").html(response.termsAndCondition.terms_and_conditions);
            let html = "";
            let i = 1;
            response.invoice_info.forEach(element => {
                html += `<tr>
                <td class="text-center">${i++}</td>
                <td class="text-center" id="category">${element.date}</td>
                <td class="text-center" id="name">${element.booking_id}</td>
                <td class="text-center" id="quantity">${element.transaction_id==1 ? "BANK" : "Mobile" }</td>
                <td class="text-center" id="quantity">${element.amount}</td>
                </tr>`
            });
            $(".productdata").html(html);
        }
    });

}


function clearData() {
    $("#productdata").trigger("reset");
}
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();
    document.body.innerHTML = originalContents;
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

