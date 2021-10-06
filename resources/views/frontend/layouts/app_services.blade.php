		<!-- Our Service Section -->
		<section class="service-section pad-80 section-bg-clr" id="our-services">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-md-7">
						<div class="sec-title pab-40">
							<h2 class="heading">Our Services</h2>
                            {{-- {!! $appsetting->banner_text !!} --}}
						</div>
					</div>
				</div>
				<div class="row">
                    @foreach($serviceData as $data)
					<div class="col-md-4 col-sm-6 mb-3">
						<div class="services-box">
                            <img src="{{$data->icon ? '/' . $data->icon :  '/frontend-assets/assets/img/icon_truck_fast.svg'}}" alt="img">
							{{-- <i class="{{$data->icon}}"></i> --}}
							<h4>{{$data->title}}</h4>
							<p>{{$data->description}}</p>
							<a class="readmore" href="#"><span>Read More</span></a>
						</div>
					</div>
                    @endforeach
					{{-- <div class="col-md-4 col-sm-6 mb-3">
						<div class="services-box">
							<i class="fas fa-truck fa-3x mb-4"></i>
							<h4>Nationwide Delivery</h4>
							<p>Duis molestie enim mattis gravida viverra. Fusce ut eros augue. Sed id mauris vel neque</p>
							<a class="readmore" href="#"><span>Read More</span></a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 mb-3">
						<div class="services-box">
							<i class="fas fa-ticket-alt  fa-3x mb-4"></i>
							<h4>Fulfillment solution</h4>
							<p>Duis molestie enim mattis gravida viverra. Fusce ut eros augue. Sed id mauris vel neque</p>
							<a class="readmore" href="#"><span>Read More</span></a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 mb-3">
						<div class="services-box">
							<i class="fas fa-briefcase fa-3x mb-4"></i>
							<h4>Corporate Service/Contract Logistics</h4>
							<p>Duis molestie enim mattis gravida viverra. Fusce ut eros augue. Sed id mauris vel neque</p>
							<a class="readmore" href="#"><span>Read More</span></a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 mb-3">
						<div class="services-box">
							<i class="fas fa-hand-holding-usd fa-3x mb-4"></i>
							<h4>Cash on Delivery</h4>
							<p>Duis molestie enim mattis gravida viverra. Fusce ut eros augue. Sed id mauris vel neque</p>
							<a class="readmore" href="#"><span>Read More</span></a>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 mb-3">
						<div class="services-box">
							<i class="fas fa-sync fa-3x mb-4"></i>
							<h4>Reverse Logistic</h4>
							<p>Duis molestie enim mattis gravida viverra. Fusce ut eros augue. Sed id mauris vel neque</p>
							<a class="readmore" href="#"><span>Read More</span></a>
						</div>
					</div> --}}

				</div>
			</div>
		</section>
		<!-- End Our Service Section-->
