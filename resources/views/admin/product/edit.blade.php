@extends('layouts.app')
@section('content')
<h3>Product</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Add Category</div>
        <div class="panel-options">
            <a href="/admin/product"><button class="btn btn-success ">LIST</button></a>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="{{Route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                       <center>
                           <div class="fileinput-new thumbnail" style="height: 140px; width:140px">
                                <img id="previmage" src="{{$product->image ? '/' . $product->image :  '/assets/images/album-image-1.jpg'}}" width="140">
                            </div>
                        </center>
                        <label for="profile_photo" class="control-label">Product Photo</label>
                        <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="name" class="control-label">Product Name*</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter product Name" value="{{$product->name}}">
                    </div>
                </div>
                {{-- <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="name" class="control-label">Enter Product Size*</label>
                        <input type="text" class="form-control" id="product_size" name="product_size" placeholder="Enter Product Size" value="{{$product->product_size}}">
                    </div>
                </div> --}}
            </div>
            <div class="col-md-6">
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="category_id" class="control-label">Category*</label>
                        <select name="category_id" id="category_id" class="form-control" onchange=subCategoryChange()>
                            @foreach($category as $categoryValue)
                            <option  value="{{ $categoryValue->id }}" {{$categoryValue->id == $product->category_id ? 'selected' : ''}}>{{ $categoryValue->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="category_id" class="control-label">Sub-Category*</label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control">

                        </select>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="phone" class="control-label">Selling Price*</label>
                        <input type="number" class="form-control" id="sell_price" name="sell_price" placeholder="Enter Selling Price" value="{{$product->sell_price}}">
                    </div>
                </div>
                <input id="subCategoryValue" type="hidden" value="{{$product->subcategory_id}}">
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="phone" class="control-label">Reseller Commission(%)</label>
                        <input type="number" class="form-control" id="commission_percent" name="commission_percent" placeholder="Enter Reseller Commission(%)" value="{{$product->commission_percent}}">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-12">
                        <label for="name" class="control-label">Enter Product Details*</label>
                        <textarea type="text" class="form-control" id="product_details" name="product_details">{{$product->product_details}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-success">Save</button>
            <a class="btn btn-secondary"  href="/admin/product">Close</a>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
CKEDITOR.replace('product_details');
$(document).ready(function () {
    function getSubCategory(){
    let id = $("#category_id").val();
    let url = '/admin/product/subcategory/'+id;
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        success: function (response) {
            console.log(response)
           let html = $();
           html = html.add("<option selected disabled hidden>--Sub-categories--</option>")
            $.each(response, function (i, item) {
                html = html.add("<option value=" + item.id +" >" + item.name + "</option>")
            });
            $("#subcategory_id").html(html);
        }
    });
}
getSubCategory();
});
function subCategoryChange() {
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
</script>
@endsection
