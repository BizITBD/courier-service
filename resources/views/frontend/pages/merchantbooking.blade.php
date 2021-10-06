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
                                <form  action="/merchant-booking" method="post" class="order-create-form">
                                    @csrf
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Store</label>
												<div class="input-group">
                                                    <input name="store" id="store" class="form-control" disabled value="{{Auth::guard('login')->user()->company_name??'null'}}">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Product Type</label>
												<div class="input-group">
													<input name="product_type" id="product_type" class="form-control" disabled value="Parcel">
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
																	<input type="text" name="recipient_name" id="recipient_name" class="form-control">
																</div>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Recipient Phone</label>
																<div class="input-group">
																	<input type="text" name="recipient_phone" id="recipient_phone" class="form-control">
																</div>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group">
																<label>Merchant Address</label>
																<div class="input-group">
																	<textarea name="recipient_address" id="recipient_address" class="form-control" class="address"></textarea>
																</div>
															</div>
														</div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Recipient City(*)</label>
                                                                <div class="input-group">
                                                                    <select type="text" name="recipient_city" id="city_id1" class="form-control" onchange=getArea()>
                                                                        <option selected disabled hidden>--Select City--</option>
                                                                        @foreach($cities as $data)
                                                                        <option value="{{$data->id}}">{{$data->city_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Area</label>
																<div class="input-group">
                                                                    <select name="recipient_area" id="recipient_zone1" class="form-control" onchange=getType()>
                                                                        <option selected disabled hidden>--Select Area--</option>
                                                                    </select>
																</div>
															</div>
                                                        </div>

                                                        <div class="col-md-6">
															<div class="form-group">
																<label>Charges(weight)</label>
                                                                <input type="checkbox" aria-hidden="true" onclick=customcharge() id="nothing">
																<div class="input-group">
                                                                    <select name="charge_type" id="type_id" class="form-control" onchange=getDelivery()>
                                                                        <option selected disabled hidden>--Select Charges--</option>
                                                                    </select>
																</div>
															</div>
                                                        </div>
                                                        <div class="col-md-6" id="custom22">

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
																	<textarea name="special_info" id="special_info" class="form-control"></textarea>
																</div>
															</div>
														</div>
                                                        <div class="col-md-12">
															<div class="form-group">
																<label>Cash to collect</label>
																<div class="input-group">
																	<input type="text" placeholder="Enter Amount" name="cashto_collect" id="cashto-collect" class="form-control" onkeyup=getCashToCollect()>
																</div>
															</div>
														</div>
                                                        <div class="col-md-12">
															<div class="form-group">
																<label>Product Price</label>
																<div class="input-group">
                                                                    <input type="text" placeholder="Enter Product Price" name="product_price" id="product_price" class="form-control">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
                                        </div>


                                        <input type="hidden" class="cost44" name="charges" id="cost44">
                                        <input type="hidden" class="collect-cash" name="collect-cash" id="collect-cash">


										<!-- Form Actions -->
										<div class="col-md-12">
											<div class="form-group">
												<button class="btn btn-warning" type="submit">Save</button>
												<button type="button" class="btn btn-danger">Cancel</button>
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
										<span>Cash To Collect</span>
										<span id="total_cost" class="float-right">0</span>
									</p>
									<p>
										<span>Delivery charge</span>
										<span id="delivery_charge" class="float-right">0</span>
                                    </p>
									<hr class="divider">
									<p>
										<strong>Grand Total</strong>
										<strong id="grand_total" class="float-right">0</strong>
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
        var deliveryCharges = {};
        var deliveryCharge = 0;
        var cashToCollect = 0;
        var payAble = 0;

        function getArea()
        {

            let cityid = $("#city_id1").val();
            let url2 = '/citywise_zone/'+cityid;
            $.ajax({
                type: "get",
                url: url2,
                dataType: "json",
                success: function (response) {
                    let html = "";
                    html+='<option selected disabled hidden>Select Zone</option>'
                    response.forEach(element => {

                    html+='<option value='+element.id+'>'+element.zone_name+'</option>'
                    })
                    $("#recipient_zone1").html(html);

                }
            });
        }
        function getType(){
            let cityid = $("#city_id1").val();
            let areaId = $("#recipient_zone1").val();
            let url = '/get_area';
            let html = '';
            $.ajax({
                type: "get",
                url: url,
                data: {"cityid":cityid,"areaId":areaId},
                dataType: "json",
                success: function (response) {
                    html += '<option selected disabled hidden>--Select Type--</option>'
                    response.forEach(element =>{
                        html+='<option value='+element.id+'>'+element.type.name+'</option>'
                    });
                    deliveryCharges = response;
                    $("#type_id").html(html);
                }

            });
        }
        function customcharge(){
            let html = '';
            if($("#nothing").prop("checked") == true){
                html += `
                <div class="form-group">
                    <label>Custom Charge(BDT)</label>
                    <div class="input-group">
                        <input type="text" name="charges" id="custom" class="form-control" onkeyup=getDelivery()>
                    </div>
                </div>
            `

            $("#custom22").html(html);
            $("#type_id").html('<option selected disabled hidden>--Select Charges--</option>')
            }
            else if($("#nothing").prop("checked") == false){
                $("#custom22").html('');
                getType()
            }
            $("#delivery_charge").text(0);
                       $("#cost44").text(0);
                       deliveryCharge=0;
        }
        function getDelivery(){
            console.log($("#nothing").prop("checked"));
            if($("#nothing").prop("checked") == true){
                let cost = $("#custom").val();
                $("#delivery_charge").text(cost);
                $("#cost44").val(cost);
            }
            else if($("#nothing").prop("checked") == false){
                let selectedValue = $("#type_id").val();
                    deliveryCharges.forEach(element => {
                   console.log(element.id);
                   console.log(selectedValue);
                   if(element.id == selectedValue){
                       $("#delivery_charge").text(element.cost);
                       $("#cost44").val(element.cost);
                       deliveryCharge=element.cost;
                   }
               });
            }
        }
        function getCashToCollect(){
            let cashToCollect = $("#cashto-collect").val()
            $("#total_cost").text(cashToCollect);
            $("#collect-cash").val(cashToCollect)
            let cost4cal = $("#cost44").val();
            let cash4cal = $("#collect-cash").val();
            let grandtotal = parseInt(cash4cal) - parseInt(cost4cal);
            console.log(cost4cal,cash4cal);
            $("#grand_total").text(grandtotal);

        }


        </script>
        @endsection
