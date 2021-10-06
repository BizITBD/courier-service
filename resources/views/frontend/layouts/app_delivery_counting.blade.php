        <!-- Delevery Counting Section -->
        <br><br>
        <div class="row justify-content-center text-center">
            <div class="col-md-7">
                <div class="sec-title pab-40">
                    <h2 class="heading">Delivery</h2>
                </div>
            </div>
        </div>
		<section class="counting-section mask-overlay pad-80">
			<div class="container">

				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="counter white-clr">
							<span class="fab fa-first-order"></span>
							<p class="counting-number" data-count="500">{{$appsetting->count_rorder}}</p>
							<h2 class="counting-text">Order</h2>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="counter white-clr">
							<span class="far fa-stop-circle"></span>
							<p class="counting-number" data-count="500">{{$appsetting->count_pending}}</p>
							<h2 class="counting-text">Pending</h2>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="counter white-clr">
							<span class="fas fa-truck"></span>
							<p class="counting-number" data-count="500">{{$appsetting->count_delivery}}</p>
							<h2 class="counting-text">Delivery</h2>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Delevery Counting Section -->
