@extends('layouts.app')
@section('content')
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>SL</th>
                <th>Merchant Name</th>
                <th>Total Booking</th>
                <th>Total Payable</th>
                <th>Total Due</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>@php $sl = 1; @endphp
            @foreach($merchantPaymentData as $data)
                <tr>
                    <td>{{$sl ++}}</td>
                    <td>{{$data->Reseller->name}}</td>
                    <td>{{$data->total_booking}}</td>
                    <td>{{$data->total_payable}}</td>
                    <td>{{$data->total_due}}</td>
                    <td class="text-center">
                        <button class="btn btn-success" id="view" data-toggle="modal" data-target="#view-moadal-2" onclick=getHistory({{$data->Reseller->id}})>View</button>
                        <button class="btn btn-success" data-toggle="modal" data-target="#view-moadal"
                            onclick=getinfos({{$data->Reseller->id}})>Payment</button>
                    </td>
                </tr>
                @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>SL</th>
                <th>Reseller Name</th>
                <th>Total Booking</th>
                <th>Total Commission</th>
                <th>Total Due</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

    {{-- pay modal --}}
    <div class="modal fade" id="view-moadal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="/admin/Merchant-pay" id="post-form" method="post">
                    @csrf
                    <div class="modal-body">

                        <div>
                            <center>
                                <h3>Merchant Payment</h3>
                                <hr>
                            </center>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <h4>Merchant Details</h4>
                                <strong>Name:</strong>
                                <span class="reseller_name" id="reseller_name"></span>
                                <br>
                                <strong>Company: </strong>
                                <span class="reseller_company" id="reseller_company"></span>
                                <br>
                                <strong>Phone: </strong>
                                <span class="reseller_phone" id="reseller_phone"></span>
                                <br>
                                <strong>Email: </strong>
                                <span class="reseller_email" id="reseller_email"></span>
                                <br>
                                <strong>Facebook Page: </strong>
                                <span class="reseller_fb_page" id="reseller_fb_page"></span>
                            </div>
                            <div class="col-md-6">
                                <h4>Transaction Details</h4>
                                <select onchange=transactionDetails() id="select" class="form-control" name="transaction_type">
                                    <option value="" selected>*select transaction method*</option>
                                    <option value="1">Banking Details</option>
                                    <option value="2">Mobile Banking Details</option>
                                </select><br>
                                <input type="hidden" name="reseller_id" id="reseller_id">
                                <input type="hidden" name="transaction_id" id="transaction_id">
                                <div id="bank-info">
                                </div>
                            </div>
                        </div>
                        <hr><br>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Booking ID</th>
                                    <th>Payable Amount</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Pay Merchant</th>
                                </tr>
                            </thead>
                            <tbody class="commission-data" id="commission-data">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Booking ID</th>
                                    <th>Payable Amount</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Pay Merchant</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>



                    <div class="modal-footer">
                        <span id="reseller-pay"></span>
                        {{-- <button type="button" class="btn btn-info" onclick=payFromDue()>Pay From Due</button> --}}
                        <button type="button" id="clear" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-check"></i>&nbspOK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- history modal --}}
    <div class="modal fade" id="view-moadal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-body">

                        <div>
                            <center>
                                <h3>Reseller Details And History</h3>
                                <hr>
                            </center>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                                <h4>Reseller Details</h4>
                                <strong>Name:</strong>
                                <span class="reseller_name" id="reseller_name"></span>
                                <br>
                                <strong>Company: </strong>
                                <span class="reseller_company" id="reseller_company"></span>
                                <br>
                                <strong>Phone: </strong>
                                <span class="reseller_phone" id="reseller_phone"></span>
                                <br>
                                <strong>Email: </strong>
                                <span class="reseller_email" id="reseller_email"></span>
                                <br>
                                <strong>Facebook Page: </strong>
                                <span class="reseller_fb_page" id="reseller_fb_page"></span>
                            </div>
                            <div class="col-md-4">
                                <h4>Bank transanction info :</h4>
                                <strong>Bank Name:</strong>
                                <span class="bank-name"></span>
                                <br>
                                <strong>Account Number: </strong>
                                <span class="account-number"></span>
                                <br>
                                <strong>Accountant Name: </strong>
                                <span class="accountant-name"></span>
                                <br>
                                <strong>Branch Name: </strong>
                                <span class="branch-name"></span>
                                <br>
                                <strong>Routing Number: </strong>
                                <span class="routing-number"></span>
                            </div>
                            <div class="col-md-4">
                                <h4>Mobile Transanction Info :</h4>
                                <strong>Account Type:</strong>
                                <span class="account-type"></span>
                                <br>
                                <strong>Account Number: </strong>
                                <span class="mobile-account-number"></span>
                            </div>
                        </div>




                        <hr><br>
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Booking ID</th>
                                    <th>Payable Amount</th>
                                    <th>paid</th>
                                    <th>due</th>
                                </tr>
                            </thead>
                            <tbody id="details">
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Booking ID</th>
                                    <th>Payable Amount</th>
                                    <th>paid</th>
                                    <th>due</th>
                                </tr>
                                </tr>
                            </tfoot>
                        </table>

                    </div>



                    <div class="modal-footer">
                        <button type="button" id="clear" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-check"></i>&nbspOK</button>
                    </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        var resellerId = '';

        function getinfos(id) {
            console.log(id)
            let url = '/admin/merchant-payment/' + id;
            let commissionDataHtml = "";
            resellerId = id;
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $("#reseller_name").text(response.name);
                    $("#reseller_company").text(response.company_name);
                    $("#reseller_email").text(response.email);
                    $("#reseller_fb_page").text(response.fb_page_link);
                    $("#reseller_phone").text(response.phone);
                    $("#reseller_id").val(response.id)
                    let i = 1;
                    response.payment_data.forEach(element => {
                        // console.log(element)
                        commissionDataHtml +=
                            `<tr>
                                <td>${i++}</td>
                                <td>${element.created_at}</td>
                                <td>${element.booking_id}</td>
                                <td>${element.payable}</td>
                                <td>${element.paid ? element.paid : 0}</td>
                                <td>${element.due ? element.due : 0}</td>Enter Amount
                                <td>
                                <label for="ppp[]" style="color: lightcoral;">Pay Here</label>
                                <input class="form-control" id="ppp[]" value="${element.due}" type="text" placeholder="Enter Amount" name="pay[]">
                                <input class="form-control" type="hidden" name="invoice_id[]" value="${element.booking_id}">
                                </td>
                                </tr>`
                        $("#commission-data").html(commissionDataHtml);
                    });

                },
                error: function(error) {
                    console.log('working')
                }
            });
        }

        function transactionDetails() {
            var value = $("#select").val();
            if (value == 1) {
                let htmlBank = "";
                let bankUrl = '/admin/reseller_payment/bank/' + resellerId;
                $.ajax({
                    type: "get",
                    url: bankUrl,
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        htmlBank +=
                            `<h5>Bank transanction info :</h5>
                                <strong>Bank Name:</strong>
                                <span class="bank-name" id="bank-name">${response.bank_name}</span>
                                <br>
                                <strong>Account Number: </strong>
                                <span class="account-number" id="account-number">${response.account_number}</span>
                                <br>
                                <strong>Accountant Name: </strong>
                                <span class="accountant-name" id="accountant-name">${response.accountant_name}</span>
                                <br>
                                <strong>Branch Name: </strong>
                                <span class="branch-name" id="branch-name">${response.branch_name}</span>
                                <br>
                                <strong>Routing Number: </strong>
                                <span class="branch-name" id="routing-number">${response.routing_number}</span>`


                        $("#bank-info").html(htmlBank);
                        // $("#bank-name").text(response.bank_name)
                        // $("#account-number").text(response.account_number)
                        // $("#accountant-name").text(response.accountant_name)
                        // $("#branch-name").text(response.branch_name)
                        // $("#routing-number").text(response.routing_number)
                        $("#transaction_id").val(response.id)
                        $("#reseller-pay").html('<button class="btn btn-success" type="submit">Pay Merchant</button>')
                    },
                    error: function(error) {
                        htmlBank += `<strong class="text-danger">No Information Found For Banking!!</strong>  `
                        $("#bank-info").html(htmlBank);
                    }

                });
            } else if (value == 2) {
                let htmlmobile = "";
                let mobileUrl = '/admin/reseller_payment/mobile/' + resellerId;
                $.ajax({
                    type: "get",
                    url: mobileUrl,
                    dataType: "json",
                    success: function(response) {
                        console.log(response)
                        htmlmobile +=
                            `<h5>Mobile Banking Transanction Info :</h5>
                                <strong>Account Type:</strong>
                                <span class="account-type" id="account-type"></span>
                                <br>
                                <strong>Account Number: </strong>
                                <span class="mobile-account-number" id="mobile-account-number"></span>`
                        $("#bank-info").html(htmlmobile);
                        $("#account-type").text(response.account_type)
                        $("#mobile-account-number").text(response.mobile_number)
                        $("#transaction_id").val(response.id)
                        $("#reseller-pay").html('<button class="btn btn-success" type="submit">Pay Merchant</button>')
                    },
                    error: function(error) {
                        htmlmobile += `<strong class="text-danger">No Information Found for Mobile Banking!!</strong>  `
                        $("#bank-info").html(htmlmobile);
                    }

                });
            }
        }
        function payFromDue(){

            let data = $("#post-form").get(0);
            let url =
            $.ajax({
                type: "post",
                url: "url",
                data: new FormData(data),
                dataType: "json",
                success: function (response) {

                }
            });
        }


        $("#clear").click(function() {
            console.log("OK");
            $("#select").val('');
            $("#bank-info").html('');
            $("#commission-data").html('');
        });
        function getHistory(id){
            console.log(id);
            let url = '/admin/merchant-payment/' + id;
            let commissionDataHtml = "";
            // let urlHistory = '/admin/reseller_payment/history/'+id;
            let bankUrl2 = '/admin/reseller_payment/bank/' + id;
            let mobileUrl2 = '/admin/reseller_payment/mobile/' + id;
            let detailsData = '';
            resellerId = id;
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function(response) {
                    $(".reseller_name").text(response.name);
                    $(".reseller_company").text(response.company_name);
                    $(".reseller_email").text(response.email);
                    $(".reseller_fb_page").text(response.fb_page_link);
                    $(".reseller_phone").text(response.phone);
                    $(".reseller_id").val(response.id)

                    let i = 1;
                    response.payment_data.forEach(element => {
                        // console.log(element)
                        commissionDataHtml +=
                            `<tr>
                                <td>${i++}</td>
                                <td>${element.created_at}</td>
                                <td>${element.booking_id}</td>
                                <td>${element.payable}</td>
                                <td>${element.paid ? element.paid : 0}</td>
                                <td>${element.due ? element.due : 0}</td>
                            </tr>`
                        $("#details").html(commissionDataHtml);
                    });
                },
                error: function(error) {
                    console.log('working')
                }
            });
            $.ajax({
                type: "get",
                url: bankUrl2,
                dataType: "json",
                success: function (response) {
                console.log(response)
                    $(".bank-name").text(response.bank_name);
                    $(".account-number").text(response.account_number);
                    $(".accountant-name").text(response.accountant_name);
                    $(".branch-name").text(response.branch_name);
                    $(".routing-number").text(response.routing_number);
                },
                error: function(error){
                    $(".bank-name").text('no data');
                    $(".account-number").text('no data');
                    $(".accountant-name").text('no data');
                    $(".branch-name").text('no data');
                }
            });
            $.ajax({
                type: "get",
                url: mobileUrl2,
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    $(".account-type").text(response.account_type);
                    $(".mobile-account-number").text(response.mobile_number);
                },
                error:function(error){
                    $(".account-type").text('no data');
                    $(".mobile-account-number").text('no data');
                }
            });
            // $.ajax({
            //     type: "get",
            //     url: urlHistory,
            //     dataType: "json",
            //     success: function (response) {
            //         console.log(response);
            //         let i = 1;
            //         response.total_commission.forEach(element => {
            //             console.log(element)
            //             detailsData +=
            //                 `<tr>
            //                     <td>${i++}</td>
            //                     <td>${element.created_at}</td>
            //                     <td>${element.invoice_id}</td>
            //                     <td>${element.commission}</td>
            //                     <td>${element.paid ? element.paid : 0}</td>
            //                     <td>${element.due ? element.due : 0}</td>
            //                     </tr>`
            //             $("#details").html(detailsData);
            //         });
            //     }
            // });

        }

    </script>
@endsection
