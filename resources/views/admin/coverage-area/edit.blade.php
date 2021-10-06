@extends('layouts.app')
@section('content')
<h3>Coverage Area</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Add New Coverage Area Data</div>
        <div class="panel-options">
            <a href="/admin/coverage_area"><button class="btn btn-success ">List</button></a>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="/admin/coverage_area/{{$oldData->id}}" method="post">
        @csrf
        @method('put')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="city_id" class="control-label">City</label>
                        <select name="city_id" id="city_id" class="form-control" onchange=getArea()>
                            @foreach ($cities as $data)
                                <option {{$data->id == $oldData->city_id ? 'selected' : ''}} value="{{$data->id}}">{{$data->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="area_id" class="control-label">Area</label>
                        <select name="area_id" id="area_id" class="form-control">
                            @foreach ($areas as $data)
                                <option {{$data->id == $oldData->area_id ? 'selected' : ''}} value="{{$data->id}}">{{$data->zone_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="cod_charge" class="control-label">COD Charge</label>
                        <input type="text" class="form-control" id="cod_charge" name="cod_charge" value="{{$oldData->cod_charge}}" placeholder="Enter COD Charge">
                    </div>
                </div>
                <div class="form-group col-md-12">
                        <div class="col-sm-7">
                            <label for="post_code" class="control-label">Post Code</label>
                            <input type="text" class="form-control" id="post_code" name="post_code" value="{{$oldData->post_code}}" placeholder="Enter Post Code">
                        </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="home_delivery" class="control-label">Home Delivery</label>
                        <select name="home_delivery" id="home_delivery" class="form-control">
                            <option selected disabled hidden>--Select One--</option>
                            <option {{$oldData->lockdown == 0 ? 'selected' : ''}} value="0">Yes</option>
                            <option {{$oldData->lockdown == 1 ? 'selected' : ''}} value="1">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="lockdown" class="control-label">Lockdown</label>
                        <select name="lockdown" id="lockdown" class="form-control">
                            <option {{$oldData->lockdown == 0 ? 'selected' : ''}} value="0">Yes</option>
                            <option {{$oldData->lockdown == 1 ? 'selected' : ''}} value="1">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="charge_1kg" class="control-label">Charge(1kg)</label>
                        <input type="text" class="form-control" id="charge_1kg" name="charge_1kg" value="{{$oldData->charge_1kg}}" placeholder="Charge per 1 Kg">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="charge_2kg" class="control-label">Charge(2kg)</label>
                        <input type="text" class="form-control" id="charge_2kg" name="charge_2kg" value="{{$oldData->charge_2kg}}" placeholder="Charge per 2 Kg">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="charge_3kg" class="control-label">Charge(3kg)</label>
                        <input type="text" class="form-control" id="charge_3kg" name="charge_3kg" value="{{$oldData->charge_3kg}}" placeholder="Charge per 1 Kg">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-success">Save</button>
            <a class="btn btn-secondary"  href="/admin/coverage_area">Close</a>
        </div>
    </form>
</div>
@endsection
@section('script')
<script type="text/javascript">
function getArea(){
    let id = $("#city_id").val()
    let url = '/admin/coverage_area/area/'+id;
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            let html = '';
            response.forEach(element =>{
                        html+='<option value='+element.id+'>'+element.zone_name+'</option>'
                    });
                    $("#area_id").html(html);
        }
    });
}
</script>
@endsection
