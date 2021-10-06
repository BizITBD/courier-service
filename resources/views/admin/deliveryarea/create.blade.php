@extends('layouts.app')
@section('content')
<h3>Create Area</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Add Area</div>
        <div class="panel-options">
            <a href="/admin/delivery_area"><button class="btn btn-success ">List</button></a>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="{{Route('delivery_area.store')}}" method="post">
        @csrf
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
                        <label for="name" class="control-label">Area Name*</label>
                        <input type="text" class="form-control" id="area_name" name="area_name" placeholder="Enter Area Name">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="name" class="control-label">SelectZone</label>
                        <select type="text" class="form-control" id="zone_id" name="zone_id">
                            <option selected disabled hidden>--Click Here--</option>
                            @foreach($zoneName as $data)
                            <option value="{{$data->id}}">{{$data->zone_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <a class="btn btn-secondary"  href="/delivery_area">Close</a>
        </div>
    </form>
</div>
@endsection
