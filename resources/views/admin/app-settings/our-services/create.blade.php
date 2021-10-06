@extends('layouts.app')
@section('content')
<h3>Services</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Add New Service</div>
        <div class="panel-options">
            <a href="/admin/our_services"><button class="btn btn-success ">List</button></a>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="{{Route('our_services.store')}}" method="post" enctype="multipart/form-data">
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
                       <center>
                           <div class="fileinput-new thumbnail" style="height: 140px; width:140px">
                                <img id="previmage" src="/assets/images/album-image-1.jpg" width="140">
                            </div>
                        </center>
                        <label for="profile_photo" class="control-label">Service Icon</label>
                        <input type="file" class="form-control" id="icon" name="icon" onchange="readURL(this);">
                    </div>
                </div>





                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="name" class="control-label">Service Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Service Title">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-12">
                        <label for="name" class="control-label">Serve Description</label>
                        <textarea type="text" class="form-control" id="description" name="description"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-success">Save</button>
            <a class="btn btn-danger"  href="/admin/our_services">Close</a>
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
