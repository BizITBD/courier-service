@extends('layouts.app')
@section('content')
		<!-- User Profile Section -->
		<section class="user-profile-section pad-80 design-process-section" id="process-tab">
			<div class="container">
			    <div class="row">
			        <div class="col-md-12 col-xs-12">
				        <!-- Nav tabs -->
				        <ul class="nav nav-tabs justify-content-center process-model more-icon-preocess" role="tablist">
					        <li role="presentation" class="active">
					          	<a href="#profile" aria-controls="discover" role="tab" data-toggle="tab"><i class="fa fa-search" aria-hidden="true"></i>
					            	<p class="mt-1"><strong>Profile</strong></p>
					            </a>
					        </li>
				        </ul>

			            <!-- Tab panes -->
				        <div class="row">
				        	<div class="col-md-9 m-0 m-auto">
				        		<div class="tab-content box-shadow-1">
						            <div role="tabpanel" class="tab-pane active" id="profile">
							            <div class="tab-inner">
							                <h1 class="bold" style="text-align: center" >Profile</h1>
							                <div class="row">
							                	<div class="col-md-12" style="text-align: center">
							                		<h2>{{$userData->name}}</h2>
							                		<h2>{{$userData->email}}</h2>
							                		<button class="btn btn-success">EDIT</button>
							                	</div>
							                </div>
							            </div>
						            </div>

							        <div role="tabpanel" class="tab-pane" id="orders">
							            <div class="tab-inner">
							              <h3 class="semi-bold">Orders</h3>
							                <div class="table-responsive">
							                	<table width="100%" class="cart-order-item table table-bordered table-striped">
													<thead class="text-center">
														<tr>
															<th>Image</th>
															<th>Product</th>
															<th>Price</th>
															<th>Subtotal</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody class="text-center">
														<tr>
															<td class="text-center">
																<a href="#">
																	<img src="assets/img/item.png" alt="product" width="70">
																</a>
															</td>
															<td class="">
																<a href="#">
																	<h6><strong>Diasulin N</strong></h6>
																</a>
																<p class="font-14 mb-1">Price: 200/-</p>
																<p class="font-14 mb-1">SubTotal: 200/-</p>
															</td>
															<td class="">
																1200 Tk
															</td>
															<td class="">
																1200 Tk
															</td>
															<td class="">
																<button class="badge-default border-0">
																	<i class="fas fa-trash text-danger"></i>
																</button>
															</td>
														</tr>
														<tr>
															<td class="text-center">
																<a href="#">
																	<img src="assets/img/item.png" alt="product" width="70">
																</a>
															</td>
															<td class="">
																<a href="#">
																	<h6><strong>Diasulin N</strong></h6>
																</a>
																<p class="font-14 mb-1">Price: 200/-</p>
																<p class="font-14 mb-1">SubTotal: 200/-</p>
															</td>
															<td class="">
																1200 Tk
															</td>
															<td class="">
																1200 Tk
															</td>
															<td class="">
																<button class="badge-default border-0">
																	<i class="fas fa-trash text-danger"></i>
																</button>
															</td>
														</tr>
														<tr>
															<td colspan="3"></td>
															<td><strong>Total: </strong></td>
															<td> 1200 Tk </td>
														</tr>
													</tbody>
												</table>
							                </div>
							            </div>
							        </div>
						        </div>
				        	</div>
				        </div>
				    </div>
			    </div>
			</div>
	    </section>
		<!-- End User Profile Section-->
@endsection
