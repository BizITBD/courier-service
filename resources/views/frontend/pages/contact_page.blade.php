@extends('frontend.layouts.app')
@section('frontendcontent')
        <!-- Banner Section -->
		<section class="banner mask-overlay pad-120" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(/frontend-assets/assets/img/bg1.jpg);">
			<div class="container">
				<div class="banner-content white-clr">
					<div class="text-center">
						<h1 class="banner-content-title">Contact With Us<br></h1>
						<ul class="breadcrumb">
						  <li><a href="/">Home</a></li>
						  <li>Contact</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- End Banner Section -->

		<!-- Contact Section -->
		<section class="contact-section pad-80">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-sm-12">
						<div class="section-heading pab-20">
                            <h3>Contact with us</h3>
                            <p>It's very easy to get in touch with us. Just use the contact form or pay us a
                                visit for a coffee at the office. Dynamically innovate competitive technology after an expanded array of leadership.</p>
                        </div>
                        <div class="address-box">
                        	<h5 class="font-w-700 mb-2">Head Office</h5>
                        	<p>1 Mirpur Rd, Dhaka 1216</p>
                        </div>
					</div>
					<div class="col-md-7">
                        <form action="{{Route('contact')}}" method="post" class="contact-us-form">
                            @csrf
                            @method('POST')
							<h5 class="font-w-700 mb-3">Reach us quickly</h5>
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<div class="form-group">
										<input type="text" name="name" class="form-control" placeholder="Enter Name">
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Enter Email">
									</div>
								</div>
								<div class="col-md-12 col-xs-12">
									<div class="form-group">
										<textarea name="Message" class="form-control" rows="7" cols="25" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="col-sm-12 col-xs-12">
									<div class="form-group">
										<button class="btn btn-warning custom-btn br-3" type="submit">Send Message</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- End Contact Section-->
@endsection
