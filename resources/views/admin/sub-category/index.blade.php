@extends('layouts.app')
@section('content')
    <h3>Sub CStegory</h3>

    <br/>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Sub-Category List</div>
            <div class="panel-options">
                <a href="{{Route('product_sub_category.create')}}"><button class="btn btn-success btn-sm" style="margin-top: 8%">Add New Sub-Category</button></a>
            </div>
        </div>
        <div class="panel-heading">
            <div class="panel-options" style="margin-top: 1%;margin-bottom:1%">
                <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2" method="get"
                      action="/country">
                    <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                           aria-label="Search" name="search" value="{{ request()->query("search") }}">
                    <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
        <div style="overflow: auto">

            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Subcategory Name</th>
                    <th class="text-center">Category Name</th>
                    <th class="text-center">image</th>
                    <th class="text-center">Slug</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>
                    @php $sl=1; @endphp
                    @foreach($subcategoryData as $data)
                    <tr>
                        <td class="text-center">{{$sl++}}</td>
                        <td class="text-center">{{$data->name}}</td>
                        <td class="text-center">{{$data->category_id ? $data->category->name:""}}</td>
                        <td class="text-center"><img style="width: 80px;" src="/{{$data->image}}"></td>
                        <td class="text-center">{{$data->slug}}</td>
                        <td class="text-center"><div  class="label {{ $data->status==1 ? 'label-success' : 'label-warning' }}">{{ $data->status == 1 ? 'on' : 'off '}}</div></td>


                        <td class="text-center " style="display:flex; justify-content:center;">
                            <a href="{{Route('product_sub_category.edit' , $data->id)}}"><button class="btn btn-xs btn-info edit">Edit</button></a>

                            <a class="btn btn-xs {{$data->status == 1 ? 'btn-success' :' btn-warning'}}" href="product_sub_category/status/{{$data->id}}">STATUS</a>

                            <a href="/admin/product_sub_category/{{$data->id}}" data="{{$data->id}}" class="btn btn-xs btn-danger delete-confirm" id="delete" type="button" data="">DELETE</a>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <center></center>
        </div>
@endsection
@section('script')
<script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    const id = $(this).attr('data');
    console.log(id);
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            $.ajax({
                    url: "/admin/product_sub_category/" + id,
                    data: id,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.warning("Product Deleted successfully", "!!!");
                        window.location.href = "/admin/product_sub_category/" ;

                    },
                });
        }
    });
});
</script>
@endsection

