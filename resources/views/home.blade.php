@extends('layouts.app')
@section('content')


    <div class="row">
        <div class="col-sm-3 col-xs-6">

            <div class="tile-stats tile-blue">
                <div class="icon"><i class="entypo-users"></i></div>
                <div class="num" id="assignedCount">0</div>
                <h3>Commission Due</h3>
                <p>Total Pending Reseller Commission</p>
            </div>

        </div>

        <div class="col-sm-3 col-xs-6">

            <div class="tile-stats tile-green">
                <div class="icon"><i class="entypo-chart-bar"></i></div>
                <div class="num" id="approvedCount" data-min=0 data-increment=3 data-delay=1>0</div>
                <h3>Merchant Cash Due</h3>
                <p>Total Pending Merchant Cash</p>
            </div>

        </div>

        <div class="clear visible-xs"></div>

        <div class="col-sm-3 col-xs-6">

            <div class="tile-stats tile-aqua">
                <div class="icon"><i class="entypo-mail"></i></div>
                <div class="num" id="countryCount" data-min=0 data-increment=3 data-delay=1>0</div>
                <h3>Today Reseller Booking</h3>
                <p>Today Reseller Booking</p>
            </div>

        </div>

        <div class="col-sm-3 col-xs-6">

            <div class="tile-stats tile-red">
                <div class="icon"><i class="entypo-rss"></i></div>
                <div class="num" id="universityCount" data-min=0 data-increment=3 data-delay=1>0</div>
                <h3>Today Merchant Orders</h3>
                <p>Today Merchant Booking</p>
            </div>

        </div>
    </div>
<br />
<div class="row">
    <div class="col-sm-7">

        <div class="panel panel-primary" id="charts_env">

            <div class="panel-heading">
                <div class="panel-title">Most Booked Products</div>
            </div>

            <div class="panel-body">
                <canvas id="studentDoughnut" height="130"></canvas>
            </div>

        </div>

    </div>

    <div class="col-sm-5">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Most Active Reseller And Merchant Stats</div>
            </div>
            <div class="panel-body">
                <canvas id="countryBar" height="170"></canvas>
            </div>
        </div>

    </div>
</div>


<br />

<div class="row">

    <div class="col-sm-6">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Most Delivered Cities</div>
            </div>
            <div class="panel-body">
                <canvas id="universityLine" height="170"></canvas>
            </div>
        </div>

    </div>

    <div class="col-sm-6">

        <div class="panel panel-primary" id="charts_env">

            <div class="panel-heading">
                <div class="panel-title">Recent Merchant Bookings</div>
            </div>

            <div class="panel-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Merchant Name</th>
                            <th class="text-center">City</th>
                            <th class="text-center">Delivery charge</th>
                            <th class="text-center">Cash To COllect</th>
                            <th class="text-center">Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl=1; @endphp
                        @foreach ($lastMerchantBookings as $data)
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center">{{ $data->Reseller->name }}
                                <td class="text-center">{{ $data->City->city_name}}</td>
                                <td class="text-center">{{ $data->charges}}</td>
                                <td class="text-center">{{ $data->cashto_collect}}</td>
                                <td class="text-center">{{ $data->paid}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</div>
@endsection


@section('script')
    <script>
        $(document).ready(function(){
            productPie();
            commissionBar();
            mostCityLine();
            // councilorPolarArea();
            counters();
        })
        function counters(){
            $.ajax({
                url:"/admin/counter",
                type:"get",
                dataType:"json",
                success:function(data){
                    console.log(data)
                    $("#assignedCount").text(data.resellerTotalCommissionDue);
                    $("#approvedCount").text(data.merchantTotalCommissionDue);
                    $("#countryCount").text(data.todayResellerBookings);
                    $("#universityCount").text(data.todayMerchantBookings);
                    $('.num').counterUp({
                        delay: 5,
                        time: 500
                    });
                }
            });
        }
        function productPie(){
            $.ajax({
                url:"/admin/popular_product",
                type:"get",
                dataType:"json",
                success:function(data){
                    let student = $('#studentDoughnut');
                    let myDoughnutChart = new Chart(student, {
                        type: 'doughnut',
                        data: {
                                labels: data.label,
                                datasets: [{
                                    label: 'Most Sold Product',
                                    data: data.value,
                                    backgroundColor: [
                                        'rgba(255, 97, 131, 0.35)',
                                        'rgba(240, 246, 44, 0.42)',
                                        'rgba(79, 255, 31, 0.38)',
                                        'rgba(0, 0, 0, 0.33)',
                                        'rgba(49, 82, 201, 0.27)',
                                    ],
                                    borderColor: [
                                        'rgba(255, 97, 131, 1)',
                                        'rgba(240, 246, 44, 1)',
                                        'rgba(79, 255, 31, 1)',
                                        'rgba(0, 0, 0, 1)',
                                        'rgba(49, 82, 201, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {}
                    });
                }
            });
        }
        function commissionBar(){
            $.ajax({
                url:"/admin/active-reseller",
                type:"get",
                dataType:"json",
                success:function(data){
                    // console.log(data)
                    let country = $('#countryBar');
                    let myBarChart = new Chart(country, {
                        type: 'bar',
                        data: {
                                labels: data.label,
                                datasets: [{
                                    label: 'Total Order',
                                    data: data.value,
                                    backgroundColor: [
                                        'rgba(255, 97, 131, 0.35)',
                                        'rgba(240, 246, 44, 0.42)',
                                        'rgba(79, 255, 31, 0.38)',
                                        'rgba(0, 0, 0, 0.33)',
                                        'rgba(49, 82, 201, 0.27)',
                                        'rgba(201, 79, 49, 0.33)',
                                        'rgba(39, 211, 203, 0.33)',
                                        'rgba(200, 39, 211, 0.26)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 97, 131, 1)',
                                        'rgba(240, 246, 44, 1)',
                                        'rgba(79, 255, 31, 1)',
                                        'rgba(0, 0, 0, 1)',
                                        'rgba(49, 82, 201, 1)',
                                        'rgba(201, 79, 49, 1)',
                                        'rgba(39, 211, 203, 1)',
                                        'rgba(200, 39, 211, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                    });
                }
            });
        }
        function mostCityLine(){
            $.ajax({
                url:"/admin/most_city",
                type:"get",
                dataType:"json",
                success:function(data){
                    let university = $('#universityLine');
                    let myLineChart = new Chart(university, {
                        type: 'line',
                        data: {
                                labels: data.label,
                                datasets: [{
                                    label: 'Most Delivered City',
                                    data: data.value,
                                    backgroundColor: [
                                        'rgba(49, 82, 201, 0.27)',
                                    ],
                                    fill:false,
                                    borderColor: [
                                        'rgba(49, 82, 201, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                    });
                }
            });
        }
        // function councilorPolarArea(){
        //     $.ajax({
        //         url:"/councilor_polar_area",
        //         type:"get",
        //         dataType:"json",
        //         success:function(data){
        //             let councilor = $('#councilorPolarArea');
        //             let myPolarChart = new Chart(councilor, {
        //                 type: 'polarArea',
        //                 data: {
        //                         labels: data.label,
        //                         datasets: [{
        //                             label: 'Students',
        //                             data: data.value,
        //                             backgroundColor: [
        //                                 'rgba(255, 97, 131, 0.35)',
        //                                 'rgba(240, 246, 44, 0.42)',
        //                                 'rgba(79, 255, 31, 0.38)',
        //                                 'rgba(0, 0, 0, 0.33)',
        //                                 'rgba(49, 82, 201, 0.27)',
        //                                 'rgba(201, 79, 49, 0.33)'
        //                             ],
        //                             borderColor: [
        //                                 'rgba(255, 97, 131, 1)',
        //                                 'rgba(240, 246, 44, 1)',
        //                                 'rgba(79, 255, 31, 1)',
        //                                 'rgba(0, 0, 0, 1)',
        //                                 'rgba(49, 82, 201, 1)',
        //                                 'rgba(201, 79, 49, 1)'
        //                             ],
        //                             borderWidth: 1
        //                         }]
        //                     },
        //                     options: {}
        //             });
        //         }
        //     });
        // }
    </script>
@stop
