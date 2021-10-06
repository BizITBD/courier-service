        <!-- Our Products Section -->
		<section class="product-section pad-80 section-bg-clr">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-md-3">
						<div class="sec-title pab-40">
							<h2 class="heading">Our Products</h2>
						</div>
					</div>
				</div>

                @php
                $categories = \App\Category::where('status', 1)->get();
                @endphp
                <div class="row">
					<div class="products-filter pab-40">
						<a href="/products"><button type="button" class="btn-grad" data-filter="all">All Products</button></a>

                        @foreach($categories as $data)
						<a href="/category/{{$data->slug}}"><button type="button" class="btn-grad" data-filter="all">{{$data->name}}</button></a>
                        @endforeach
					</div>
				</div>
                <br>


				<div class="row" id="category_component">


				</div>
			</div>
		</section>
        <!-- End Our Products Section-->
        @section('script')
        <script type="text/javascript">
        $(document).ready(function () {
         $.ajax({
            url : '/api/v1/categories',
            type : "get",
            dataType: 'json',
            success:function(data)
            {
                let html="";
                let html2 =`<a href="/products"><button type="button" class="btn-grad" data-filter="all">All Products</button></a>`;
                data.data.forEach(element => {
                   html+=`<div class="col-md-2 col-sm-6 mb-3">
						<div class="product-box">
							<a href="/category/${element.slug}">
								<img src="${element.image}">
								<div class="overlay-text-effect">
									<p class="mb-0">${element.name}</p>
								</div>
							</a>
						</div>
                    </div>`;
                    html2+=`
                    <div class="row"
                    <div class="products-filter pab-40">
						<a href="/category/${element.slug}"><button type="button" class="btn-grad" data-filter="all">${element.name}</button></a>

					</div>
                    </div>
                    `
                });
                $("#category_component").html(html);
                $("#category_name").html(html2);
            }
         })
        });
        </script>
        @endsection
