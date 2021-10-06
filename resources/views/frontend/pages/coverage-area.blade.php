@extends('frontend.layouts.app')
@section('frontendcontent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">


<div class="row">
    <br />
    <div class="col text-center">
        <strong><h2 class="heading">Coverage Area Data</h2></strong>
    </div>
</div>



<div class="row gutters-sm">
    <div class="col-sm-12 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Coverage Area Tabe</i></h6>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>SL</th>
            <th>City</th>
            <th>Area</th>
            <th>Post Code</th>
            <th>Delivery</th>
            <th>Lockdown</th>
            <th>Charge(1 KG)</th>
            <th>Charge(2 KG)</th>
            <th>Charge(3 KG)</th>
            <th>COD</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @php $sl=1; @endphp
        @foreach($coverageAreaData as $data)
        <tr>
            <td>{{$sl++}}</td>
            <td>{{$data->city->city_name}}</td>
            <td>{{$data->area->zone_name}}</td>
            <td>{{$data->post_code}}</td>
            <td>{{$data->home_delivery == 0 ? 'yes' : 'no'}}</td>
            <td>{{$data->lockdown == 0 ? 'yes' : 'no'}}</td>
            <td>{{$data->charge_1kg}}</td>
            <td>{{$data->charge_2kg}}</td>
            <td>{{$data->charge_3kg}}</td>
            <td>{{$data->cod_charge}}</td>
            <td class="text-center"><div  class="label {{ $data->status==1 ? 'label-success' : 'label-info' }}">{{ $data->status == 1 ? 'On' : 'Off '}}</div></td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>SL</th>
            <th>City</th>
            <th>Area</th>
            <th>Post Code</th>
            <th>Delivery</th>
            <th>Lockdown</th>
            <th>Charge(1 KG)</th>
            <th>Charge(2 KG)</th>
            <th>Charge(3 KG)</th>
            <th>COD</th>
            <th>Status</th>
        </tr>
    </tfoot>
</table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
@endsection
