        <!-- About Us Section -->
		<section class="about-us-section pad-80 section-bg-clr" style="padding-top: 80px; padding-bottom: 0px;">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-md-7">
						<div class="sec-title pab-40">
							<h2 class="heading">About Us</h2>
						</div>
					</div>
				</div>
				<div class="row">
                    @foreach($aboutUsData as $data)
					<div class="col-md-4 mb-3">
						<div class="feature-box">
							<img src="{{$data->icon ? '/' . $data->icon :  '/frontend-assets/assets/img/icon_truck_fast.svg'}}" alt="img">
							<div class="feature-content">
								<h4>{{$data->title}}</h4>
								<p>{{$data->description}}</p>
							</div>
						</div>
					</div>
                    @endforeach
					{{-- <div class="col-md-4 mb-3">
						<div class="feature-box">
							<img src="/frontend-assets/assets/img/icon_track.svg" alt="img">
							<div class="feature-content">
								<h4>Full Tracking</h4>
								<p>Duis molestie enim mattis gravida viverra. Fusce ut eros augue. Sed id mauris vel neque</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<div class="feature-box">
							<img src="/frontend-assets/assets/img/icon_wide_cover.svg" alt="img">
							<div class="feature-content">
								<h4>Wide Coverage</h4>
								<p>Duis molestie enim mattis gravida viverra. Fusce ut eros augue. Sed id mauris vel neque</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<div class="feature-box">
							<img src="/frontend-assets/assets/img/icon_solution.svg" alt="img">
							<div class="feature-content">
								<h4>One Stop Solution</h4>
								<p>Duis molestie enim mattis gravida viverra. Fusce ut eros augue. Sed id mauris vel neque</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<div class="feature-box">
							<img src="/frontend-assets/assets/img/icon_delivery.svg" alt="img">
							<div class="feature-content">
								<h4>Delivery confirmation with OTP</h4>
								<p>Duis molestie enim mattis gravida viverra. Fusce ut eros augue. Sed id mauris vel neque</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<div class="feature-box">
							<img src="/frontend-assets/assets/img/icon_cash-hand.svg" alt="img">
							<div class="feature-content">
								<h4>Cash on Delivery (COD)</h4>
								<p>Duis molestie enim mattis gravida viverra. Fusce ut eros augue. Sed id mauris vel neque</p>
							</div>
						</div>
					</div> --}}
				</div>
			</div>
		</section>
		<!-- End Our Service Section-->
