@extends('layouts.app')
@section('content')
    <h3>Merchant Interests</h3>

    <br/>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">Merchant Interest List</div>
            <div class="panel-options">
                <a href="{{Route('merchant-interests.create')}}"><button class="btn btn-success btn-sm" style="margin-top: 8%">Add New Interest</button></a>
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
                    <th class="text-center">Interest Name</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>
                    @php $sl=1; @endphp
                    @foreach($interests as $data)
                    <tr>
                        <td class="text-center">{{$sl++}}</td>
                        <td class="text-center">{{$data->name}}</td>
                        <td class="text-center"><div  class="label {{ $data->status==1 ? 'label-success' : 'label-warning' }}">{{ $data->status == 1 ? 'on' : 'off '}}</div></td>
                        <td class="text-center " style="display:flex; justify-content:center;">


                            <a class="btn btn-xs {{$data->status == 1 ? 'btn-success' :' btn-warning'}}" href="merchant-interests/status/{{$data->id}}">STATUS</a>


                            <a href="/admin/merchant-interests/{{$data->id}}" data="{{$data->id}}" class="btn btn-xs btn-danger delete-confirm" id="delete" type="button" data="">DELETE</a>
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
                    url: url,
                    data: id,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.warning("Merchant Interest Deleted successfully", "!!!");
                        window.location.href = "/admin/merchant-interests";

                    },
                });
        }
    });
});
</script>
@endsection
