@extends('frontend.layouts.app')
@section('frontendcontent')


		<!-- Our Service Section -->
		<section class="product-section pad-80 section-bg-clr">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-md-7">
						<div class="sec-title pab-20">
							<h2>{{$category->name ?? ''}} {{ $subCategory->name ?? ''}}</h2>
                            <hr>
						</div>
					</div>
				</div>
                <style>
                    @import url('https://fonts.googleapis.com/css?family=Open+Sans');
                    @import url('https://fonts.googleapis.com/css?family=Montserrat');

                body {
                    font-family: 'Montserrat', sans-serif;

                }
                .btn-group .dropdown-menu a{
                    color:#fff;
                }

                .btn-default .dropdown-menu {
                color: #000 !important;
                }
                .btn-default .dropdown-menu li > a:hover,
                .btn-default .dropdown-menu li > a:focus {
                background-color: #000 !important;
                color:#fff !important;
                }
                .btn-group-primary .dropdown-menu {
                background-color: #ffa520 !important;
                }
                .btn-group-primary .dropdown-menu li > a:hover,
                .btn-group-primary .dropdown-menu li > a:focus {
                background-color: #ffa520 !important;
                }
                /* Category Ads */
                #ads {
                    margin: 30px 0 30px 0;

                }
                #ads .card-notify-badge {
                        position: absolute;
                        left: -10px;
                        top: -20px;
                        background: #f2d900;
                        text-align: center;
                        border-radius: 30px 30px 30px 30px;
                        color: #000;
                        padding: 5px 10px;
                        font-size: 14px;

                    }

                #ads .card-notify-year {
                        position: absolute;
                        right: -10px;
                        top: -20px;
                        background: #ff4444;
                        border-radius: 50%;
                        text-align: center;
                        color: #fff;
                        font-size: 14px;
                        width: 50px;
                        height: 50px;
                        padding: 15px 0 0 0;
                }
                #ads .card-detail-badge {
                        background: #f2d900;
                        text-align: center;
                        border-radius: 30px 30px 30px 30px;
                        color: #000;
                        padding: 5px 10px;
                        font-size: 14px;
                    }



                #ads .card:hover {
                            background: #fff;
                            box-shadow: 12px 15px 20px 0px rgba(238, 149, 16, 0.255);
                            border-radius: 4px;
                            transition: all 0.3s ease;
                        }

                #ads .card-image-overlay {
                        font-size: 20px;

                    }


                #ads .card-image-overlay span {
                            display: inline-block;
                        }


                #ads .ad-btn {
                        text-transform: uppercase;
                        width: 150px;
                        height: 40px;
                        border-radius: 80px;
                        font-size: 16px;
                        line-height: 35px;
                        text-align: center;
                        border: 3px solid #e6de08;
                        display: block;
                        text-decoration: none;
                        margin: 20px auto 1px auto;
                        color: #000;
                        overflow: hidden;
                        position: relative;
                        background-color: #e6de08;
                    }

                #ads .ad-btn:hover {
                            background-color: #e6de08;
                            color: #1e1717;
                            border: 2px solid #e6de08;
                            background: transparent;
                            transition: all 0.3s ease;
                            box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
                        }

                #ads .ad-title h5 {
                        text-transform: uppercase;
                        font-size: 18px;
                    }
                </style>
                <div class="row">
					<div class="products-filter pab-40">
                        <a href="/products"><button type="button" class="btn-grad" data-filter="all">All Product</button></a>
                        {{-- @foreach($categoryName as $data)
						<a href="/category/{{$data->slug}}"><button type="button" class="btn-grad" data-filter="all">{{$data->name}}</button></a>
                        @endforeach --}}
                        @foreach($categoryName as $data)
                        <div class="btn-group btn-group-primary">
                            <button class="btn btn-primary btn-grad" type="button"> <a href="/category/{{$data->slug}}">{{$data->name}}</a></button>
                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-grad" type="button"><span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach ($data->subCategory as $item)
                                <li class="text-center"><a href="/sub-category/{{$item->slug}}">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
					</div>
				</div>
				<div class="row">
					<div class="products-filter pab-40">
						{{-- <button type="button" class="btn-grad" data-filter="all">All</button> --}}
						{{-- <button type="button" class="btn-grad" data-filter=".food">Food</button> --}}
						{{-- <button type="button" class="btn-grad" data-filter=".cloth">Cloth</button> --}}
						{{-- <button type="button" class="btn-grad" data-filter=".electronics">Electronics</button> --}}
					</div>
				</div>
				<div class="row product-container">
                    @foreach($products as $data)
					<div class="col-md-2 col-sm-6 mb-3">
						<div class="product-box mix cloth food">
							<a href="#">
								<img src="/{{$data->image}}" class="img-fluid">
							</a>
							<h4>{{$data->name}}</h4>
						</div>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#product_details" onclick=getProductDetails({{$data->id}})>
                            View Details <span class="badge badge-primary"></span>
                        </button>
                    </div>
                    @endforeach
                </div>
                <div class="d-inline-flex">{{ $products->links() }}</div>
			</div>
             <!-- Modal -->
             <div class="modal fade" id="product_details" tabindex="-1" role="dialog" aria-labelledby="product_detailsTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Product Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <br>
                            <h2 id="product_name"></h2>
                            <div class="card text-center">
                              <div class="card-body">
                                <h4 class="card-title">Details:</h4>
                                <h6 id="product-details" class="card-text"></h6>
                              </div>
                            </div>
                            <br>
                            <div class="row" id="ads">
                            <!-- Category Card -->
                            <div class="col-md-12">
                                <div class="card rounded">
                                    <div class="card-image">
                                        <span class="card-notify-badge">Availabe</span>
                                        <img class="img-fluid" id="image"/>
                                    </div>
                                    <div class="card-image-overlay m-auto">
                                        <span class="card-detail-badge">Sell Price</span>
                                        <span class="card-detail-badge" id="sell-price"></span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
                </div>
            </div>
		</section>
        @endsection
        @section('script')
        <script type="text/javascript">
            function getProductDetails(id){
            let url = "/api/v1/productwise_details/"+id;
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $("#product_name").text(response.name);
                    $("#image").attr("src","/"+response.image);
                    $("#sell-price").text('BDT-'+response.sell_price);
                    $("#product-details").html(response.product_details);
                }
            });
        }
        </script>
        @endsection
