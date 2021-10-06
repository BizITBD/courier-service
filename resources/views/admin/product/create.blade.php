@extends('layouts.app')
@section('content')
<h3>Product</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Add Product</div>
        <div class="panel-options">
            <a href="/admin/product"><button class="btn btn-success ">List</button></a>
        </div>
    </div>
    <form role="form" class="form-horizontal" action="{{Route('product.store')}}" method="post" enctype="multipart/form-data">
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
                        <label for="name" class="control-label">Product Name*</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                       <center>
                           <div class="fileinput-new thumbnail" style="height: 140px; width:140px">
                                <img id="previmage" src="/assets/images/album-image-1.jpg" width="140">
                            </div>
                        </center>
                        <label for="profile_photo" class="control-label">Product Photo</label>
                        <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-12">
                        <label for="name" class="control-label">Enter Product Details*</label>
                        <textarea type="text" class="form-control" id="details" name="product_details"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group col-md-12">
                        <div class="col-sm-7">
                            <label for="category_id" class="control-label">Category*</label>
                            <select name="category_id" id="category_id" class="form-control" onchange=getSubCategory()>
                                <option selected disabled hidden>--Categories--</option>
                                @foreach($data as $category)
                                <option  value="{{ $category->id}}">{{ $category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-sm-7">
                            <label for="subcategory_id" class="control-label">Sub-Category*</label>
                            <select name="subcategory_id" id="subcategory_id" class="form-control">
                                <option selected disabled hidden>--Sub-categories--</option>
                            </select>
                        </div>
                    </div>

                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="phone" class="control-label">Selling Price*</label>
                        <input type="number" class="form-control" id="sell_price" name="sell_price" placeholder="Enter Selling Price">
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="phone" class="control-label">Reseller Commission(%)</label>
                        <input type="number" class="form-control" id="commission_percent" name="commission_percent" placeholder="Enter Reseller Commission">
                    </div>
                </div>
                {{-- <div class="form-group col-md-12">
                    <div class="col-sm-7">
                        <label for="name" class="control-label">Enter Product Size*</label>
                        <input type="text" class="form-control" id="product_size" name="product_size" placeholder="Enter Product Size">
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-success">Save</button>
            <a class="btn btn-secondary"  href="/product">Close</a>
        </div>
    </form>
</div>
@endsection
@section('script')
<script type="text/javascript">
CKEDITOR.replace('details');
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
</script>
@endsection
