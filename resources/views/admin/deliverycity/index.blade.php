@extends('layouts.app')
@section('content')
    <h3>Delivery Cities</h3>

    <br/>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">City List</div>
            <div class="panel-options">
                <a href="{{Route('deliverycity.create')}}"><button class="btn btn-success btn-sm" style="margin-top: 8%">Add New City</button></a>
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
                    <th class="text-center">City Name</th>
                    <th class="text-center">Delivery Fee</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>
                    @php $sl=1; @endphp
                    @foreach($citydata as $data)
                    <tr>
                        <td class="text-center">{{$sl++}}</td>
                        <td class="text-center">{{$data->city_name}}</td>
                        <td class="text-center">{{$data->delivery_fee}}</td>
                        <td class="text-center"><div  class="label {{ $data->status==1 ? 'label-success' : 'label-warning' }}">{{ $data->status == 1 ? 'on' : 'off '}}</div></td>
                        <td class="text-center " style="display:flex; justify-content:center;">
                            <a href="{{Route('deliverycity.edit' , $data->id)}}"><button class="btn btn-xs btn-info edit"><i class="entypo-pencil"></i></button></a>
                            <a class="btn btn-xs {{$data->status == 1 ? 'btn-success' :' btn-warning'}}" href="deliverycity/status/{{$data->id}}"><i class="entypo-arrows-ccw"></i></a>
                            <form method="post" action="{{Route('deliverycity.destroy' , $data->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-xs btn-danger" id="delete" type="submit" data=""><i class="entypo-trash"></i></button>
                            </form>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <center></center>
        </div>
@endsection
