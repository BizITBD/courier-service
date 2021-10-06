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
            <br />
            <div class="col text-center heading">
                <h2>Merchant Payment Dashboard</h2>
                <p>Recent Merchant Payment activites</p>
            </div>
        </div>
        {{-- @php
            $data = \App\BookingBaseModel::where('reseller_id', Auth::guard('login')->id())->get();
        @endphp --}}
        <div class="row text-center">
            <div class="col">
                <div class="counter mergin">
                    <h2 class="timer count-title count-number" data-to="{{$totalBooking}}" data-speed="1500"></h2>
                    <p class="count-text ">Total Booking</p>
                </div>
            </div>
            <div class="col">
                <div class="counter mergin">
                    <h2 class="timer count-title count-number" data-to="{{$totalcash}}" data-speed="1500"></h2>
                    <p class="count-text ">Total Cash To Collect</p>
                </div>
            </div>
            <div class="col">
                <div class="counter mergin">
                    <h2 class="timer count-title count-number" data-to="{{$totalPayable}}" data-speed="1500"></h2>
                    <p class="count-text ">Payable Cash</p>
                </div>
            </div>
        <div class="col">
            <div class="counter mergin">
                <h2 class="timer count-title count-number" data-to="{{$paid}}" data-speed="1500"></h2>
                <p class="count-text ">Cash Paid</p>
            </div>
        </div>
            <div class="col">
            <div class="counter mergin">
                <h2 class="timer count-title count-number" data-to="{{$due}}" data-speed="1500"></h2>
                <p class="count-text ">Cash Due</p>
            </div>
        </div>
    </div>

        <style>
            .counter {
                background-color: #f5f5f5;
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

            .mergin {
                margin-top: 20px;
                margin-bottom: 100px;
                background-color: #fe7f013c;
            }

        </style>



         <h3 class="text-center heading">Merchant Booking List</h3>
        <br />
    </div>
    <div class="card h-100">
    <div class="card-body">
        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Merchant History</i></h6>
        <table class="table table-reponsive">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Date And Time</th>
                    <th>Cash To Collect</th>
                    <th>Booking Number</th>
                </tr>
            </thead>
            <tbody>
                @php $sl=1; @endphp
                @foreach ($merchantBookingData as $data)
                <tr>
                    <td scope="row">{{$sl++}}</td>
                    <td scope="row">{{$data->created_at}}</td>
                    <td>{{$data->payable}}</td>
                    <td>{{$data->booking_id}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Total Commission</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                <h5>{{$totalPayable}}</h5>
            </div>
        </div>
        {{ $merchantBookingData->links() }}
    </div><hr><br>
    </div>

@endsection



@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });

    </script>
    <script type="text/javascript">
        function showData(id) {
            let url = "/api/v1/resellerwise_show_data/" + id;
            console.log(id);
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function(response) {
                    $("#recipent_name").text(response.recipent.recipient_name);
                    $("#recipent_phone").text(response.recipent.recipient_phone);
                    $("#recipent_address").text(response.recipent.recipient_address);
                    let html = "";
                    let i = 1;
                    response.product.forEach(element => {
                        html += `<tr>
                                     <td class="text-center">${i++}</td>
                                     <td class="text-center" id="category">${element.category.name}</td>
                                     <td class="text-center" id="name">${element.product.name}</td>
                                     <td class="text-center" id="quantity">${element.quantity}</td>
                                     <td class="text-center" id="sell_price">${element.price}</td>
                                     <td class="text-center" id="total">${element.quantity*element.price}</td>
                                 </tr>`
                    });
                    $("#productdata").html(html);
                }
            });
        }



        (function($) {
            $.fn.countTo = function(options) {
                options = options || {};

                return $(this).each(function() {
                    // set options for current element
                    var settings = $.extend({}, $.fn.countTo.defaults, {
                        from: $(this).data('from'),
                        to: $(this).data('to'),
                        speed: $(this).data('speed'),
                        refreshInterval: $(this).data('refresh-interval'),
                        decimals: $(this).data('decimals')
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
                from: 0, // the number the element should start at
                to: 0, // the number the element should end at
                speed: 1000, // how long it should take to count between the target numbers
                refreshInterval: 100, // how often the element should be updated
                decimals: 0, // the number of decimal places to show
                formatter: formatter, // handler for formatting the value before rendering
                onUpdate: null, // callback method for every time the element is updated
                onComplete: null // callback method for when the element finishes updating
            };

            function formatter(value, settings) {
                return value.toFixed(settings.decimals);
            }
        }(jQuery));

        jQuery(function($) {
            // custom formatting example
            $('.count-number').data('countToOptions', {
                formatter: function(value, options) {
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
