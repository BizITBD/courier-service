@extends('layouts.app')
@section('content')
    <h3>Product</h3>

    <br/>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Category List</div>
            <div class="panel-options">
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal"
                        style="margin-top: 8%"><i class="fa fa-plus-square"></i>&nbsp&nbspAdd
                </button>
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
                    <th class="text-center">Name</th>
                    <th class="text-center">Slug</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>
                @php $sl=1; @endphp
                @foreach($categories as $category)
                    <tr>
                        <td class="text-center">{{$sl++}}</td>
                        <td class="text-center">{{$category->name}}</td>
                        <td class="text-center">{{$category->slug}}</td>
                        <td class="text-center"><img src="/{{$category->image ?? 'assets/images/sample.jpg' }}" width="60" /></td>
                         <td class="text-center">
                            <div class="label {{ $category->status==1 ? 'label-success' : 'label-warning' }}">{{ $category->status==1 ? 'On' : 'Off' }}</div>
                        </td>



                        <td class="text-center">

                            <button class="btn btn-xs btn-info edit" data-toggle="modal" data-target="#editModal" onclick=edit({{$category->id}})>Edit</button>

                            <a class="btn btn-xs {{ $category->status==1 ? 'btn-success' : 'btn-warning' }}" href="/admin/category/status/{{$category->id}}">Status</a>

                            <button class="btn btn-xs btn-danger" id="delete" type="button" data="{{$category->id}}">DELETE</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <center></center>
        </div>


        <form method="post" id="deleteForm">
            @method('delete')
            @csrf
        </form>

        <div class="modal fade" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Category</h4>
                    </div>
                    <form method="POST" id="addform" enctype="multipart/form-data">
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
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Category name:*</label>
                                <input class="form-control" placeholder="Enter Category name" type="text" name="name"
                                       id="name">
                                <span class="text-danger"></span>

                                <div class="form-group">
                                    <label for="details">Image</label>
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default add-close" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade in" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Category</h4>
                    </div>
                    <form id="editform" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Category name:*</label>
                                <input class="form-control e_name" placeholder="Enter Category name" type="text" name="name">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="details">Image</label>
                                <input class="form-control" type="file" id="image_e" name="image">
                            </div>
                            <center><img id="e_image" width="250"/></center>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@stop
@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $("#addform").submit(function (e) {
                e.preventDefault();
                let url = "/admin/category"
                let data = $("#addform").get(0);

                $.ajax({
                    type: "post",
                    url: url,
                    enctype: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    data: new FormData(data),
                    dataType: "json",
                    success: function (data) {
                        if (data['alert-type'] === 'success') {
                            toastr.success("Product Added successfully", "Success!");
                            $(".add-close").click();
                            window.location.reload();
                        }
                    }
                });
            });
        });
        function edit(id) {
            let url = "/admin/category/"+id+"/edit";
            $.ajax({
                url  :url,
                type :"get",
                dataType:"json",
                success:function(data){
                    $(".e_name").val(data.name);
                    $("#editform").attr("action","/admin/category/"+data.id)
                    let newdata = $("#e_image").attr("src","/"+data.image);
                }
            });
        }
        $(document).on("click","#delete",function () {
        let id = $(this).attr('data');
        let url = "/admin/category/"+id;

        console.log(id);
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete)=>{
                if(willDelete)
                {
                    $.ajax({
                        url :url,
                        type :'Delete',
                        data : {"_token": "{{ csrf_token() }}"},
                        dataType : 'json',
                        success:function (data) {
                            if(data.status==201)
                            {
                                swal('success!' , 'data deleted' , 'success');
                                window.location.reload();
                            }
                        }
                    })
                }
                else
                {
                    swal("Category not deleted!");
                }
            })
        })
    </script>
@endsection
