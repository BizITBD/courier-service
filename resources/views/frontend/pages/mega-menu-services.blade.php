@extends('frontend.layouts.app')
@section('frontendcontent')
        <!-- Banner Section -->
		<section class="banner mask-overlay pad-120" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),  url({{$megaMenu->banner ? '/' . $megaMenu->banner : '/frontend-assets/assets/img/bg1.jpg'}});">
			{{-- url(/frontend-assets/assets/img/bg1.jpg); --}}
            <div class="container">
				<div class="banner-content white-clr">
					<div class="text-center">
						<h1 class="banner-content-title">{{$megaMenu->title}}<br></h1>
						<ul class="breadcrumb">
						  <li><a href="/">Home</a></li>
						  <li>Services</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- End Banner Section -->

		<!-- Contact Section -->
		<section class="contact-section pad-80">
			<div class="container">


                    <div class="row justify-content-center text-center">
                        {{-- <div class="col-md-3">
                            <div class="sec-title pab-40">
                                <h3 ccolass="banner-content-title">{{$megaMenu->subtitle}}<br></h3>
                            </div>
                        </div> --}}
                        <div class="section-heading pab-20">
                            <h3 class="heading">{{$megaMenu->subtitle}}</h3>
                            <p>{!! $megaMenu->description !!}</p>
                        </div>
                    </div>

			</div>
		</section>
		<!-- End Contact Section-->
@endsection
