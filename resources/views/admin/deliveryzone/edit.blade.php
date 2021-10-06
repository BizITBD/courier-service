@extends('layouts.app')
@section('content')
<h3>Edit Zone</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Edit Zone</div>
    </div>
    <form role="form" class="form-horizontal" action="{{Route('delivery_zone.update',$editZoneData->id)}}" method="post">
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
                        <label for="name" class="control-label">Zone Name*</label>
                        <input type="text" class="form-control" id="zone_name" name="zone_name" placeholder="Enter Zone Name" value="{{$editZoneData->zone_name}}">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="name" class="control-label">City Name</label>
                        <select type="text" class="form-control" id="zone_name" name="city_id">
                            <option selected disabled hidden>--Cities--</option>
                            @foreach($citydata as $city)
                            <option {{$city->id == $editZoneData->city_id ? 'selected' :''}} value="{{$city->id}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-success">Update</button>
            <a class="btn btn-secondary"  href="/admin/delivery_zone">Close</a>
        </div>
    </form>
</div>
@endsection
