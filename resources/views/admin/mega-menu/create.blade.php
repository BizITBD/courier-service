@extends('layouts.app')
@section('content')
<h3>Mega Menu</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Add Mega Menu</div>
        <div class="panel-options">
            <a href="/admin/mega-menu"><button class="btn btn-success ">List</button></a>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="{{Route('mega-menu.store')}}" method="post" enctype="multipart/form-data">
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
                        <label for="title" class="control-label">Title*</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="subtitle" class="control-label">Subtitle*</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Sub Title">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="header" class="control-label">Header*</label>
                        <input type="text" class="form-control" id="header" name="header" placeholder="Enter Header">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="icon" class="control-label">Product Photo</label>
                        <input type="file" class="form-control" id="icon" name="icon" onchange="readURL(this);">
                       <center>
                           <div class="fileinput-new thumbnail" style="height: 140px; width:140px">
                                <img id="previmage" src="/assets/images/album-image-1.jpg" width="140">
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="banner" class="control-label">Banner Picture</label>
                        <input type="file" class="form-control" id="banner" name="banner" onchange="readURLB(this);">
                       <center>
                           <div class="fileinput-new thumbnail" style="height: 140px; width:140px">
                                <img id="banner1" src="/assets/images/album-image-1.jpg" width="140">
                            </div>
                        </center>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-sm-12">
                        <label for="description" class="control-label">Page Description*</label>
                        <textarea type="text" class="form-control" id="description" name="description"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-success">Save</button>
            <a class="btn btn-secondary"  href="/admin/mega-menu">Close</a>
        </div>
    </form>
</div>
@endsection
@section('script')
<script type="text/javascript">
CKEDITOR.replace('description');

function getSubCategory(){
    let id = $("#category_id").val();
    let url = '/admin/product/subcategory/'+id;

    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            let html = '';
            console.log(response)
            html+='<option selected disabled hidden>--Sub-Categories--</option>'

            response.forEach(element => {

                html+='<option value='+element.id+'>'+element.name+'</option>'
            });
            $("#subcategory_id").html(html);
        }
    });
}


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
    function readURLB(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                reader.onload = function(e) {
                    $('#banner1')
                    .attr('src', e.target.result)
                    .width(140)
                    .height(140);
                };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
@endsection
