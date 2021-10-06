@extends('frontend.layouts.app')
@section('frontendcontent')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<div class="container">
   <div class="row">
      <br/>
      <div class="col text-center heading">
            <h2>Merchant Dashboard</h2>
            <p>Recent Merchant activites</p>


      </div>
   </div>
          @php
          $data = \App\MerchantBooking::where('merchant_id',Auth::guard('login')->id())->get();
          @endphp
   <div class="row text-center">
    <div class="col">
        <div class="counter mergin">
           <h2 class="timer count-title count-number" data-to="{{collect($data)->count('booking_id')}}" data-speed="1500"></h2>
           <p class="count-text ">Total Booking</p>
        </div>
     </div>
    <div class="col">
       <div class="counter mergin">
          <h2 class="timer count-title count-number" data-to="{{collect($data)->where('status',1)->count()}}" data-speed="1500"></h2>
          <p class="count-text ">Order Pending</p>
       </div>
    </div>
      <div class="col">
         <div class="counter mergin">
            <h2 class="timer count-title count-number" data-to="{{collect($data)->where('status',2)->count()}}" data-speed="1500"></h2>
            <p class="count-text ">Order Delevered</p>
         </div>
      </div>
      <div class="col">
         <div class="counter mergin">
            <h2 class="timer count-title count-number" data-to="{{collect($data)->where('status',3)->count()}}" data-speed="1500"></h2>
            <p class="count-text ">Order Returned</p>
         </div>
      </div>
      <div class="col">
         <div class="counter mergin">
            <h2 class="timer count-title count-number" data-to="{{collect($data)->where('status',4)->count()}}" data-speed="1500"></h2>
            <p class="count-text ">Order In Transit</p>
         </div>
      </div>
      <div class="col">
        <div class="counter mergin">
           <h2 class="timer count-title count-number" data-to="{{collect($data)->where('status',5)->count()}}" data-speed="1500"></h2>
           <p class="count-text ">Order Rejected</p>
        </div>
     </div>
   </div>

<style>
    .counter {
    background-color:#f5f5f5;
    padding: 20px 0;
    border-radius: 5px;
    }
    .count-title {
    font-size: 40px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
    }
    .count-text {
    font-size: 13px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
    }
    .fa-2x {
    margin: 0 auto;
    float: none;
    display: table;
    color: #4ad1e5;
    }
    .mergin{
    margin-top: 20px;
    margin-bottom: 100px;
    background-color:#fe7f013c;
    }
 </style>














{{-- reseller booking list --}}
    <h3 class="text-center heading" >Delivery Percel</h3>

    <br/>

    <div class="panel panel-primary">
        <div class="form-controll">

            <table id="example" class="table table-bordered table-responsive" style="width:100%">
                <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Booking ID</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Product Price</th>
                                <th class="text-center">Delivery Charge</th>
                                <th class="text-center">Cash To Collect</th>
                                <th class="text-center">Delivery Status</th>
                                <th class="text-center">View</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $sl=1; @endphp
                                @foreach($delivery_data as $data)
                                <tr>
                                    <td class="text-center">{{$sl++}}</td>
                                    <td class="text-center">{{$data->booking_id}}</td>
                                    <td class="text-center">{{$data->date}}</td>
                                    <td class="text-center">{{$data->product_price}}</td>
                                    <td class="text-center">{{$data->charges}}</td>
                                    <td class="text-center">{{$data->cashto_collect}}</td>
                                    <td class="text-center">
                                        <div class="label @if($data->status==1) label-warning @elseif($data->status==2) label-primary @elseif($data->status==3) label-success
                                            @elseif($data->status==4) label-warning @else label-danger @endif">@if($data->status==1) pending @elseif($data->status==2) delevered
                                            @elseif($data->status==3) Returned @elseif($data->status==4) In Transit @elseif($data->status==5) Rejceted @endif
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        {{-- view --}}
                                        <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#view-moadal" id="view" onclick=showData({{$data->id}})> <i class="entypo-eye">Show</i></button>
                                    </td>
                                    @endforeach
                                </tr>

                            </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Order ID</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Product Price</th>
                        <th class="text-center">Delivery Price</th>
                        <th class="text-center">Total Price</th>
                        <th class="text-center">Delivery Status</th>
                        <th class="text-center">View</th>
                    </tr>
                </tfoot>
            </table>
        </div>



            <!-- Modal -->
            <div class="modal fade" id="view-moadal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Booking Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick=modalClose()>
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <div class="modal-body">
                    <div>
                        <div>
                            <div class="col-sm-12 text-center"><h4>Recipent</h4>
                                <strong>Recipent Name:</strong>
                                <span id="recipent_name"></span>
                                <br>
                                <strong>Recipent Phone: </strong>
                                <span id="recipent_phone"></span>
                                <br>
                                <strong>Recipent Address: </strong>
                                <span id="recipent_address"></span><br>
                                <strong>Special Info: </strong>
                                <span id="special_info"></span>
                            </div>
                        </div>
                        <div><br><br></div>
                        {{-- <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Product Category</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Sell Price</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                            </thead>

                            <tbody id="productdata">

                            </tbody>
                        </table> --}}
                    </div>

                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick=modalClose()><i class="fas fa-check"></i>&nbspOK</button>
                    </div>
                </div>
                </div>
            </div>
            <center></center>
    </div><br/><br/>
</div>





@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script type="text/javascript">
function showData(id){
let url = "/merchant_dashboard/details/"+id;
console.log(id);
$.ajax({
    type: "get",
    url: url,
    dataType: "json",
    success: function (response) {
        console.log(response)
        $("#recipent_name").text(response.recipient_name);
        $("#recipent_phone").text(response.recipient_phone);
        $("#recipent_address").text(response.recipient_address);
        $("#special_info").text(response.special_info);
    }
});
}



   (function ($) {
   	$.fn.countTo = function (options) {
   		options = options || {};

   		return $(this).each(function () {
   			// set options for current element
   			var settings = $.extend({}, $.fn.countTo.defaults, {
   				from:            $(this).data('from'),
   				to:              $(this).data('to'),
   				speed:           $(this).data('speed'),
   				refreshInterval: $(this).data('refresh-interval'),
   				decimals:        $(this).data('decimals')
   			}, options);

   			// how many times to update the value, and how much to increment the value on each update
   			var loops = Math.ceil(settings.speed / settings.refreshInterval),
   				increment = (settings.to - settings.from) / loops;

   			// references & variables that will change with each update
   			var self = this,
   				$self = $(this),
   				loopCount = 0,
   				value = settings.from,
   				data = $self.data('countTo') || {};

   			$self.data('countTo', data);

   			// if an existing interval can be found, clear it first
   			if (data.interval) {
   				clearInterval(data.interval);
   			}
   			data.interval = setInterval(updateTimer, settings.refreshInterval);

   			// initialize the element with the starting value
   			render(value);

   			function updateTimer() {
   				value += increment;
   				loopCount++;

   				render(value);

   				if (typeof(settings.onUpdate) == 'function') {
   					settings.onUpdate.call(self, value);
   				}

   				if (loopCount >= loops) {
   					// remove the interval
   					$self.removeData('countTo');
   					clearInterval(data.interval);
   					value = settings.to;

   					if (typeof(settings.onComplete) == 'function') {
   						settings.onComplete.call(self, value);
   					}
   				}
   			}

   			function render(value) {
   				var formattedValue = settings.formatter.call(self, value, settings);
   				$self.html(formattedValue);
   			}
   		});
   	};

   	$.fn.countTo.defaults = {
   		from: 0,               // the number the element should start at
   		to: 0,                 // the number the element should end at
   		speed: 1000,           // how long it should take to count between the target numbers
   		refreshInterval: 100,  // how often the element should be updated
   		decimals: 0,           // the number of decimal places to show
   		formatter: formatter,  // handler for formatting the value before rendering
   		onUpdate: null,        // callback method for every time the element is updated
   		onComplete: null       // callback method for when the element finishes updating
   	};

   	function formatter(value, settings) {
   		return value.toFixed(settings.decimals);
   	}
   }(jQuery));

   jQuery(function ($) {
     // custom formatting example
     $('.count-number').data('countToOptions', {
   	formatter: function (value, options) {
   	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
   	}
     });

     // start all the timers
     $('.timer').each(count);

     function count(options) {
   	var $this = $(this);
   	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
   	$this.countTo(options);
     }
   });
</script>
@endsection
