		<!-- Banner Section -->

		<section class="banner mask-overlay pad-80" style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{$appsetting->banner_picture ? '/'. $appsetting->banner_picture : '/frontend-assets/assets/img/bg6.jpg' }});">
			<div class="container">
				<div class="banner-content white-clr">
					<img src="/frontend-assets/assets/img/car.png" alt="img">
					<ul class="list-item">
						<li>
							<a href="#">{{$appsetting->banner1}}</a>
						</li>
						<li>
							<a href="#">{{$appsetting->banner2}}</a>
						</li>
						<li>
							<a href="#">{{$appsetting->banner3}}</a>
						</li>
					</ul>
					<div class="banner-content-text">
                        {!! $appsetting->banner_text !!}
						{{-- <h1 class="banner-content-title">Awesome<br>
							<span class="theme-clr">Courier</span> & <span class="theme-clr">Delivery Service</span>
						</h1>

						<p>Daily 247 guarantees reliable delivery of your product to your customer, at the right location in the right time through its efficient distribution management.</p> --}}
					</div>
					<div class="banner-content-btn">
						<a href="register.html" class="btn">Become a Merchant</a>
					</div>
				</div>
			</div>
		</section>
		<!-- End Banner Section -->
