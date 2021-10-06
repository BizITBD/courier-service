@extends('layouts.app')
@section('content')
<h3>Services</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Edit Service</div>
        <div class="panel-options">
            <a href="/admin/our_services"><button class="btn btn-success ">List</button></a>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="{{Route('about_us.update' , $aboutUsData->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                {{-- <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="name" class="control-label">Service Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Enter icon" value="{{$aboutUsData->icon}}">
                    </div>
                </div> --}}
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="name" class="control-label">Service Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Service Title" value="{{$aboutUsData->title}}">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-12">
                        <label for="name" class="control-label">Serve Description</label>
                        <textarea type="text" class="form-control" id="description" name="description">{{$aboutUsData->description}}</textarea>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                       <center>
                           <div class="fileinput-new thumbnail" style="height: 140px; width:140px">
                                <img id="previmage" src="{{$aboutUsData->icon ? '/' . $aboutUsData->icon :  '/frontend-assets/assets/img/bg6.jpg'}}" width="140">

                            </div>
                        </center>
                        <label for="profile_photo" class="control-label">Upload Icon</label>
                        <input type="file" class="form-control" id="icon" name="icon" onchange="readURL(this);">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-success">Save</button>
            <a class="btn btn-danger"  href="/admin/about_us">Close</a>
        </div>
    </form>
</div>
@endsection
@section('script')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previmage')
                    .attr('src', e.target.result)
                    .width(140)
                    .height(140);
                };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
