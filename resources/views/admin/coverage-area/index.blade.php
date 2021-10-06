@extends('layouts.app')
@section('content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"> --}}


<div>
    <a href="/admin/coverage_area/create"><button class="btn btn-info">Add New Data</button></a><br>
</div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>SL</th>
            <th>City</th>
            <th>Area</th>
            <th>Post Code</th>
            <th>Delivery</th>
            <th>Lockdown</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php $sl=1; @endphp
        @foreach($coverageData as $data)
        <tr>
            <td>{{$sl++}}</td>
            <td>{{$data->city->city_name}}</td>
            <td>{{$data->area->zone_name}}</td>
            <td>{{$data->post_code}}</td>
            <td>{{$data->home_delivery == 0 ? 'yes' : 'no'}}</td>
            <td>{{$data->lockdown == 0 ? 'yes' : 'no'}}</td>
            <td class="text-center"><div  class="label {{ $data->status==1 ? 'label-success' : 'label-info' }}">{{ $data->status == 1 ? 'On' : 'Off '}}</div></td>


            <td>

                  <button id="get-id" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal" onclick=getId("{{$data->id}}")>
                    <i class="entypo-plus-squared"></i>
                  </button>

                <a href="/admin/coverage_area/{{$data->id}}/edit"><button class="btn btn-sm btn-info edit"><i class="entypo-pencil"></i></button></a>

                <a class="btn btn-sm {{$data->status == 1 ? 'btn-success' :' btn-info'}}" href="/admin/coverage_area/status/{{$data->id}}"><i class="entypo-arrows-ccw"></i></a>

                <a href="/admin/coverage_area/{{$data->id}}" data="{{$data->id}}" class="btn btn-sm btn-danger delete-confirm" id="delete" type="button" data=""><i class="entypo-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>SL</th>
            <th>City</th>
            <th>Area</th>
            <th>Post Code</th>
            <th>Delivery</th>
            <th>Lockdown</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>


<!-- Modal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <form method="POST" id="addform" action="{{route('area-charge.store')}}">
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

                    <div id="moreField">
                        <div class="row">



                            <div>
                                <input type="hidden" value="" id="area_id" name="coverage_id">
                            </div>



                             <div class="col-md-5">
                                <label for="name">Charge Type:*</label>
                                <select class="form-control" name="type_id[]" id="type_id_1">
                                    <option selected disabled>Types</option>
                                    @foreach($chargeType as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>



                             <div class="col-md-5">
                                <label for="name">Charge:*</label>
                                <input class="form-control" placeholder="Enter Amount" type="text" name="cost[]" id="cost_1">
                             </div>



                             <div class="col-md-2">
                                {{-- <span id="addMore" class="text-success">
                                    <div>
                                    <i class="entypo-plus-squared"></i>
                                    </div>
                                </span> --}}
                                <button id="addMore" class="btn btn-success"><i class="entypo-plus-squared"></i></button>
                             </div>
                        </div>
                    </div>


                    <div class="input_field"></div>





                </div><br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success add-close" id="ok">Ok</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>



@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
var i =1;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).ready(function() {
        $('#example').DataTable();
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
                    url: "/admin/coverage_area/" + id,
                    data: id,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.warning("Product Deleted successfully", "!!!");
                        window.location.href = "/admin/coverage_area/" ;

                    },
                });
        }
    });
});
$("#addMore").click( function(e) {
    e.preventDefault();
    var wrapper = $(".input_field");
    i++;
    console.log('working');
    $(wrapper).append(`
                        <div class="row">



                             <div class="col-md-5">
                                <label for="name">Charge Type:*</label>
                                <select class="form-control" name="type_id[]" id="type_id_1">
                                    <option selected disabled>Types</option>
                                    @foreach($chargeType as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>



                             <div class="col-md-5">
                                <label for="name">Charge:*</label>
                                <input class="form-control" placeholder="Enter Amount" type="text" name="cost[]" id="cost_${i}">
                             </div>



                             <div class="col-md-2">
                                <button class="btn btn-danger remove"><i class="entypo-trash"></i></button>
                             </div>
                        </div>
    `);

        //Field Remove
        $(wrapper).on("click", ".remove", function(e) {
                e.preventDefault();
                i--;
                $(this).parent().parent().empty();
                });

});
function getId(id){

console.log(id);
$("#area_id").val(id);
}



</script>
@endsection
