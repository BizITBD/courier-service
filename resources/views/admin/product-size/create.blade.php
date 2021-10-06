@extends('layouts.app')
@section('content')
<h3>Product</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Add City</div>
        <div class="panel-options">
            <a href="/admin/product_size"><button class="btn btn-success ">Go To Size List</button></a>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="{{Route('product_size.store')}}" method="post">
        @csrf
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="name" class="control-label">Product Size*</label>
                        <input type="text" class="form-control" id="size" name="size" placeholder="Enter Product Size">
                        @error('size')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <a class="btn btn-secondary"  href="/product_size">Close</a>
        </div>
    </form>
</div>
@endsection
