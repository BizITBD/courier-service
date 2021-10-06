@extends('layouts.app')
@section('content')
<h3>Create Sub-Category</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Add Sub-Category</div>
        <div class="panel-options">
            <a href="/admin/product_sub_category"><button class="btn btn-success ">List</button></a>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="{{Route('product_sub_category.update',$subcategories->id)}}" method="post" enctype="multipart/form-data">
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
            <div class="form-group col-md-6">
                <div class="col-sm-7">
                   <center>
                       <div class="fileinput-new thumbnail" style="height: 140px; width:140px">
                            <img id="previmage" src="{{$subcategories->image ? '/' . $subcategories->image :  '/assets/images/album-image-1.jpg'}}" width="140">
                        </div>
                    </center>
                    <label for="profile_photo" class="control-label">subcategory Photo</label>
                    <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="name" class="control-label">Sub_category Name*</label>
                        <input type="text" class="form-control" value="{{$subcategories->name}}" id="name" name="name" placeholder="Enter Sub-Category Name">
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="name" class="control-label">Category Name</label>
                        <select type="text" class="form-control" id="category_id" name="category_id">
                            <option selected disabled hidden>--Categories--</option>
                            @foreach($categories as $data)
                            <option  value="{{ $data->id }}" {{$data->id == $subcategories->category_id ? 'selected' : ''}}>{{ $data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-footer">
            <button type="submit" class="btn btn-success">Save</button>
            <a class="btn btn-secondary"  href="/admin/product_sub_category">Close</a>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
function getUniversity(){
    let id=$("#country_id").val();
    let uni=$("#country_"+id).attr("data-uni");
    uni=JSON.parse(uni);
    $(".university_option").remove();
    $(".program_option").remove();
    $("#university_id").append(`
        <option selected disabled hidden>--Select University--</option>
        `);
    $.each(uni,function(i,v){
        let programs=JSON.stringify(v.programs);
        $("#university_id").append(`
        <option class='university_option' id="university_${v.id}" data-program='${programs}' value='${v.id}'>${v.name}</option>
        `);
    })
}
function getPrograms(){
    let id=$("#university_id").val();
    let program=$("#university_"+id).attr("data-program");
    program=JSON.parse(program);
    $(".program_option").remove();
    $("#program_id").append(`
        <option selected hidden disabled>--Select Program--</option>
        `);
    $.each(program,function(i,v){
        $("#program_id").append(`
        <option class='program_option' value='${v.id}'>${v.name}</option>
        `);
    })
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
</script>
@endsection
