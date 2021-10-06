@extends('layouts.app')
@section('content')
<h3>Product</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Add City</div>
        <div class="panel-options">
            <a href="/admin/deliverycity"><button class="btn btn-success ">List</button></a>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="{{Route('deliverycity.store')}}" method="post">
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
                        <label for="name" class="control-label">City Name*</label>
                        <input type="text" class="form-control" id="city_name" name="city_name" placeholder="Enter City Name">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="name" class="control-label">Delivery Fee*</label>
                        <input type="text" class="form-control" id="deivery" name="delivery_fee" placeholder="Enter Delivery Fee">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <a class="btn btn-secondary"  href="/deliverycity">Close</a>
        </div>
    </form>
</div>
@endsection
