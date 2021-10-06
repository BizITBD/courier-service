@extends('layouts.app')
@section('content')
<h3>Charge Type</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Add Charge Type</div>
        <div class="panel-options">
            <a href="/admin/charge-type"><button class="btn btn-success ">Go To List</button></a>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="{{Route('charge-type.store')}}" method="post">
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
                        <label for="name" class="control-label">Charge Type*</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Charge Type">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <a class="btn btn-secondary"  href="/admin/charge-type">Close</a>
        </div>
    </form>
</div>
@endsection
