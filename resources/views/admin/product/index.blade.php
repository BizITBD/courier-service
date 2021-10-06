@extends('layouts.app')
@section('content')
    <h3>Product</h3>

    <br/>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Product List</div>
            <div class="panel-options">
                <a href="{{Route('product.create')}}"><button class="btn btn-success btn-sm" style="margin-top: 8%">Add New Product</button></a>
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
                    <th class="text-center">#</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Sub-Category</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Sell Price</th>
                    <th class="text-center">Reseller Commission</th>
                    {{-- <th class="text-center">Product Size</th> --}}
                    <th class="text-center">Product Details</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>
                    @php $sl=1; @endphp
                    @foreach($product_data as $products)
                    <tr>
                        <td class="text-center">{{$sl++}}</td>
                        <td class="text-center">{{$products->category ? $products->category->name:""}}</td>
                        <td class="text-center">{{$products->subcategory ? $products->subcategory->name:""}}</td>
                        <td class="text-center">{{$products->name}}</td>
                        <td class="text-center">{{$products->sell_price}}</td>
                        <td class="text-center">{{$products->reseller_commission}}</td>
                        {{-- <td class="text-center">{{$products->product_size}}</td> --}}
                        <td class="text-center">{!! $products->product_details !!}</td>
                        <td class="text-center"> <img style="width: 80px;" src="/{{$products->image}}"> </td>
                        <td class="text-center"><div  class="label {{ $products->status==1 ? 'label-success' : 'label-warning' }}">{{ $products->status == 1 ? 'on' : 'off '}}</div></td>
                        <td class="text-center">
                            <a href="{{Route('product.edit',$products->id)}}"><button class="btn btn-xs btn-info edit" data-toggle="modal" data-target="#editModal">Edit
                            </button></a>
                            <a class="btn btn-xs {{$products->status == 1 ? 'btn-success' :' btn-warning'}}" href="/admin/product/status/{{$products->id}}">STATUS</a>

                               <a href="/admin/product/{{$products->id}}" data="{{$products->id}}" class="btn btn-xs btn-danger delete-confirm" id="delete" type="button" data="">DELETE</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <center></center>
            <div class="d-inline-flex">{{ $product_data->links() }}</div>
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
                    url: "/admin/product/" + id,
                    data: id,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.warning("Product Deleted successfully", "!!!");
                        window.location.href = "/admin/product/" ;

                    },
                });
        }
    });
});
</script>
@endsection
