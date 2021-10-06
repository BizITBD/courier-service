@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>SL</th>
            <th>Reseller Name</th>
            <th>Company Name</th>
            <th>Interest</th>
            <th>Facebook Page</th>
            <th>Phone No.</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @php $sl=1; @endphp
        @foreach($resellerData as $data)
        <tr>
            <td>{{$sl++}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->company_name}}</td>

            <td>
                @if($data->reseller_interest)
                    @foreach($data->reseller_interest as $interets)
                    {{$interets}}
                        @if(!$loop->last)
                        ,
                        @endif
                    @endforeach
                @else
                    {{"No Data Provided"}}
                @endif

            </td>

            <td>{{$data->fb_page_link}}</td>
            <td>{{$data->phone}}</td>
            <td>{{$data->email}}</td>
            <td class="text-center"><div  class="label {{ $data->status==1 ? 'label-success' : 'label-warning' }}">{{ $data->status == 1 ? 'Active' : 'Blocked '}}</div></td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>SL</th>
            <th>Reseller Name</th>
            <th>Company Name</th>
            <th>Interest</th>
            <th>Facebook Page</th>
            <th>Phone No.</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </tfoot>
</table>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection
