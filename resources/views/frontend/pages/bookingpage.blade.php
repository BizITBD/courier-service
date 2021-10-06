@extends('frontend.layouts.app')
@section('frontendcontent')


    <!-- Order Confirm Form -->
    <section class="order-create pad-80">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 mb-3">
                    <div class="panel">
                        <div class="panel-head">
                            <h4 class="panel-title">Create Order</h4>
                        </div>
                        <div class="panel-body">
                            <form action="/booking" method="post" class="order-create-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Store</label>
                                            <div class="input-group">
                                                <input name="store" id="store" class="form-control" disabled
                                                       value="{{Auth::guard('login')->user()->company_name??'null'}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Type</label>
                                            <div class="input-group">
                                                <input name="product_type" id="product_type" class="form-control"
                                                       disabled value="Parcel">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <h4 class="panel-title py-3">Recipient Detail</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Recipient Name</label>
                                                            <div class="input-group">
                                                                <input type="text" name="recipient_name"
                                                                       id="recipient_name" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Recipient Phone</label>
                                                            <div class="input-group">
                                                                <input type="text" name="recipient_phone"
                                                                       id="recipient_phone" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Recipient Address</label>
                                                            <div class="input-group">
                                                                <textarea name="recipient_address"
                                                                          id="recipient_address" class="form-control"
                                                                          class="address"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Recipient City(*)</label>
                                                            <div class="input-group">
                                                                <select type="text" name="city_id" id="city_id"
                                                                        class="form-control" onchange=getDelivery()>
                                                                    <option selected disabled hidden>--Select City--
                                                                    </option>
                                                                    @foreach($cities as $data)
                                                                        <option
                                                                            value="{{$data->id}}">{{$data->city_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Recipient Zone</label>
                                                            <div class="input-group">
                                                                <select name="zone_id" id="recipient_zone"
                                                                        class="form-control" onchange=getArea()>
                                                                    <option selected disabled hidden>--Select Zone--
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Recipient area</label>
                                                            <div class="input-group">
                                                                <select name="recipient_area" id="recipient_area"
                                                                        class="form-control">
                                                                    <option selected disabled hidden>--Select Area--
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <h4 class="panel-title py-3 border-bottom-1">Delivery Information</h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Special Information</label>
                                                            <div class="input-group">
                                                                <textarea name="special_info" id="special_info"
                                                                          class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <strong>Add Product Information :</strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Add product&nbsp</label>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-info btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#exampleModalCenter">
                                                                Items
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Advance Payment</label>
                                                            <div class="input-group">
                                                                <input type="number webkit-inner-spin-button"
                                                                       name="paid_amount" id="paid_amount"
                                                                       class="form-control" onkeyup=advancepay()>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Item</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 class="panel-title py-3">Item Detail</h4>
                                                    <div class="col-md-12" id="moreField">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Category</label>
                                                                    <div class="input-group">
                                                                        <select class="form-control category_1"
                                                                                name="category_id[]" id="category"
                                                                                onchange=categoryChange(1)>
                                                                            <option selected disabled hidden>
                                                                                --Categories--
                                                                            </option>

                                                                            @foreach($cetegories as $data)
                                                                                <option
                                                                                    value="{{$data->id}}">{{$data->name}}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>SubCategory</label>
                                                                    <div class="input-group">
                                                                        <select class="form-control subcategory_1"
                                                                                name="subcategory_id[]"
                                                                                id="subcategory_1"
                                                                                onchange=getProduct(1)>
                                                                            <option selected disabled hidden>
                                                                                --subCategories--
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>product</label>
                                                                    <div class="input-group">
                                                                        <select class="form-control product_1"
                                                                                name="product_id[]" id="product_1"
                                                                                onchange=getPrice(1)>
                                                                            <option selected disabled hidden>--Select
                                                                                Product--
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>size</label>
                                                                    <div class="input-group">
                                                                        <select class="form-control size_1"
                                                                                name="size[]" id="size">
                                                                            <option selected disabled hidden>Size
                                                                            </option>

                                                                            @foreach($productSize as $data)
                                                                                <option
                                                                                    value="{{$data->size}}">{{$data->size}}</option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>Quantity(*)</label>
                                                                    <div class="input-group">
                                                                        <input type="number webkit-inner-spin-button"
                                                                               min="0" name="quantity[]" id="quantity_1"
                                                                               class="form-control" value="1"
                                                                               onchange=calculateSubTotal(1)
                                                                               onkeyup=calculateSubTotal(1)>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2" style="display: ruby;">
                                                                <div class="form-group">
                                                                    <label>Sub Total</label>
                                                                    <div class="input-group">
                                                                        <input type="number webkit-inner-spin-button"
                                                                               id="subtotal_1" class="form-control"
                                                                               disabled readonly>
                                                                        <input type="hidden" id="price_1" name="price[]"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1">
                                                                <div style="margin-top:35px">
                                                                    <span id="addMore" style="cursor: pointer"
                                                                          class="text-success">
                                                                        <i class="fas fa-plus-circle"></i>
                                                                    </span>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="input_field"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal"
                                                            onclick=calculateTotal()><i class="fas fa-check">&nbspOK</i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="total_cost" name="product_price">
                                    <input type="hidden" class="delivery_fee" name="delivery_price">
                                    <input type="hidden" class="grand_total" name="total_price">
                                    <input type="hidden" class="reseller_commission" name="reseller_commission">


                                    <!-- Form Actions -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-warning" type="submit">Save</button>
                                            <a href="/booking">
                                                <button type="button" class="btn btn-danger">Cancel</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="panel">
                        <div class="panel-head">
                            <h4 class="panel-title">Cost</h4>
                        </div>
                        <div class="panel-body">
                            <div class="whole-costing-list">
                                <p>
                                    <span>Total Cost</span>
                                    <span id="total_cost" class="float-right">0</span>
                                </p>
                                <p>
                                    <span>Delivery Fee</span>
                                    <span id="delivery_fee" class="float-right">0</span>
                                </p>
                                <hr class="divider">
                                <p>
                                    <strong>Grand Total</strong>
                                    <strong id="grand_total" class="float-right">0</strong>
                                </p>
                                <p>
                                    <strong>Paid</strong>
                                    <strong id="paid" class="float-right">0</strong>
                                </p>
                                <hr class="divider">
                                <p>
                                    <strong>Due</strong>
                                    <strong id="due" class="float-right">0</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Order Confirm Form -->

@endsection


@section('script')
    <script type="text/javascript">
        let grandTotal = 0;
        let deliveryFee = 0;
        let totalCost = 0;
        let due = 0;
        let paid = 0;
        var i = 1;
        $("#addMore").click(function () {
            //add more field
            var wrapper = $(".input_field");
            i++;
            $(wrapper).append(`<div class='col-md-12'>
                                <div class='row'>
                                    <div class='col-md-2'>
                                        <div class='form-group'>
                                            <label>Category(*)</label>
                                            <div class="input-group">
                                                <select class="form-control category_${i}" name="category_id[]" id="category" onchange=categoryChange(${i})>
                                                    <option selected disabled hidden>--Categories--</option>

                                                    @foreach($cetegories as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
            </select>
        </div>
    </div>
</div>

<div class="col-md-2">
                            <div class="form-group">
                                <label>SubCategory(*)</label>
                                <div class="input-group">
                                    <select class="form-control subcategory_${i}" name="subcategory_id[]" id="subcategory_${i}" onchange=getProduct(${i})>
                                                                            <option selected disabled hidden>--subCategories--</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                    <div class='col-md-2'>
                                        <div class='form-group'>
                                            <label>product(*)</label>
                                            <div class="input-group">
                                                <select class="form-control product_${i}" name="product_id[]" id="product_${i}" onchange=getPrice(${i})>
                                                    <option selected disabled hidden>--Select Product--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>size(*)</label>
                                            <div class="input-group">
                                                <select class="form-control size_${i}" name="size[]" id="size">
                                                    <option selected disabled hidden>Size</option>

                                                    @foreach($productSize as $data)
            <option value="{{$data->size}}">{{$data->size}}</option>
                                                    @endforeach

            </select>
        </div>
    </div>
</div>

<div class='col-md-1'>
    <div class='form-group'>
        <label>Quantity</label>
            <div class="input-group">
                <input type="number webkit-inner-spin-button" min="0" name="quantity[]" id="quantity_${i}" class="form-control" value="1" onchange=calculateSubTotal(${i}) onkeyup=calculateSubTotal(${i}) >
                                                </div>
                                        </div>
                                    </div>
                                    <div class='col-md-2' style='display: ruby;'>
                                        <div class='form-group'>
                                            <label>Sub Total(*)</label>
                                            <div class="input-group">
                                                <input type="number webkit-inner-spin-button" id="subtotal_${i}" class="form-control" disabled readonly>
                                                <input type="hidden" id="price_${i}" name="price[]" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                <div class ="col-md-1">
                                    <div style="margin-top:35px">
                                            <span style='cursor: pointer'  class='removeField text-danger'>
                                                <i class='fas fa-trash'></i>
                                            </span>
                                        </div>
                                </div>

                                </div>
                            </div>`);
            //Field Remove
            $(wrapper).on("click", ".removeField", function (e) {
                e.preventDefault();
                i--;
                $(this).parent().parent().parent().empty();
            });

        });

        // get product
        function getProduct(id) {
            let iddata = $('.category_' + id).val();
            let subcategory = $(".subcategory_" + id).val();
            let url = '/categorywise_product/' + iddata;
            if (subcategory) {
                url += "?subcategory=" + subcategory
            }
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function (response) {
                    let html = '';
                    html += '<option selected disabled hidden>Select Product</option>'
                    response.forEach(element => {
                        html += '<option value=' + element.id + '>' + element.name + '</option>'
                    });
                    $("#quantity_" + id).val(1);
                    $('.product_' + id).html(html);
                    $("#subtotal_" + id).val(0);
                }
            });
        }

        function categoryChange(id) {
            $(".subcategory_" + id).val(0);
            getSubCategory(id);
            getProduct(id);
        }

        function getSubCategory(id) {
            let iddata = $('.category_' + id).val()
            let url2 = '/subcategorywise/' + iddata;
            $.ajax({
                type: "get",
                url: url2,
                dataType: "json",
                success: function (response) {
                    let html = "";
                    html += '<option selected disabled hidden>subcategory</option>'
                    response.forEach(element => {
                        html += '<option value=' + element.id + '>' + element.name + '</option>'
                    })
                    $(".subcategory_" + id).html(html);
                }
            });
        }

        function getDelivery() {

            let cityid = $("#city_id").val();
            let url = "/api/v1/delivery_fee/" + cityid;
            let url2 = '/citywise_zone/' + cityid;
            // console.log(cityid);
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function (response) {
                    deliveryFee = response
                    $("#delivery_fee").text(deliveryFee);
                    grandTotal = deliveryFee + totalCost
                    $("#grand_total").text(grandTotal);
                    $(".delivery_fee").val(deliveryFee);
                    $(".total_cost").val(totalCost);
                    $(".grand_total").val(grandTotal);
                }
            });
            $.ajax({
                type: "get",
                url: url2,
                dataType: "json",
                success: function (response) {
                    let html = "";
                    html += '<option selected disabled hidden>Select Zone</option>'
                    response.forEach(element => {

                        console.log(element);
                        html += '<option value=' + element.id + '>' + element.zone_name + '</option>'
                    })
                    $("#recipient_zone").html(html);

                }
            });
        }

        function getArea() {
            let zoneId = $("#recipient_zone").val();
            let url = '/zonewise_area/' + zoneId;
            console.log(zoneId);
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    let html = "";
                    html += '<option selected disabled hidden>Select Area</option>'
                    response.forEach(element => {
                        html += '<option value=' + element.id + '>' + element.area_name + '</option>'
                    })
                    $("#recipient_area").html(html);
                }
            });
        }

        function getPrice(i) {
            let id = $("#product_" + i).val()
            let url = "/api/v1/product_price/" + id;

            // commission section
            let productId = $(".product_" + i).val();
            let commissionUrl = '/api/v1/productwise_comission/' + productId;

            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function (response) {
                    $("#price_" + i).val(response);
                    $("#quantity_" + i).val(1);
                    $("#subtotal_" + i).val(response);
                }
            });

            // product commission get ajax
            $.ajax({
                type: "get",
                url: commissionUrl,
                dataType: "json",
                success: function (response) {
                    let qty = $('.quantity_1' + i).val();
                    let resellerCommission = response.reseller_commission;
                    let totalCommission = parseInt(resellerCommission) * parseInt(qty);
                    console.log(totalCommission);
                }
            });
        }

        function calculateSubTotal(i) {
            let qty = $("#quantity_" + i).val();
            let price = $("#price_" + i).val();
            let subtotal = parseInt(qty) * parseInt(price);
            $("#subtotal_" + i).val(subtotal);
        }

        function calculateTotal() {
            totalCost = 0;
            for (let j = 1; j <= i; j++) {
                totalCost += parseInt($("#subtotal_" + j).val());
            }
            $("#total_cost").text(totalCost);
            grandTotal = deliveryFee + totalCost
            $("#grand_total").text(grandTotal);
            $(".delivery_fee").val(deliveryFee);
            $(".total_cost").val(totalCost);
            $(".grand_total").val(grandTotal);
        }

        function advancepay() {

            paid = $("#paid_amount").val();
            $("#paid").text(paid);
            due = grandTotal - paid;

            if (paid > grandTotal) {
                $("#due").text('More than total');
            } else {
                $("#due").text(due);
            }
        }

    </script>

    <!-- Misitup Js -->
    <script src="assets/js/mixitup.min.js"></script>
@endsection
