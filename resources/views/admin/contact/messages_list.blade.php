@extends('layouts.app')
@section('content')
    <h3>Delivery Details</h3>

    <br/>

    <div class="panel panel-primary">
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

            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>
                    @php $sl=1; @endphp
                    @foreach($contactMessaes as $data)
                    <tr>
                        <td class="text-center">{{$sl++}}</td>
                        <td class="text-center">{{$data->name}}</td>
                        <td class="text-center">{{$data->email}}</td>
                            {{-- view --}}
                        <td>
                            <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#view-moadal" id="view" value="" onclick=message({{$data->id}})><i class="entypo-eye"></i>&nbsp View Message</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{-- modal --}}
    <!-- Modal -->
    <div class="modal fade" id="view-moadal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Messages</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

            <div class="modal-body">
            <div>
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Message</th>
        </tr>
        </thead>

        <tbody id="productdata">
            <td class="text-center" id="name"></td>
            <td class="text-center" id="message"></td>
        </tbody>
    </table>
</div>
        </div>
        <div style="margin-left: 840px;">
            <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            <br>
        </div>
        <center></center>
    </div>
        </div>
    </div>
        @endsection
        @section('script')
        <script type="text/javascript">
            function message(id)
            {
                let url = "/admin/contact_messages/"+id;
                // let id = $("#view").val();
                console.log(id);
                let html = "";
                let i = 1;
                $.ajax({
                    type: "get",
                    url: url,
                    dataType: "json",
                    data:"data",
                    success: function (response) {
                    console.log(response);
                    $("#name").text(response.name)
                    $("#message").text(response.Message)
                    }
                });
            }
            </script>
        @endsection





