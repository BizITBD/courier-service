@extends('frontend.layouts.app')
@section('frontendcontent')
<div class="row gutters-sm">
    <div class="col-sm-12 mb-3">
      <div class="card h-100">
        <div class="card-body">
           <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Reseller Completed Bookings</i></h6>
          <table class="table">
              <thead>
                  <tr>
                      <th>SL</th>
                      <th>Date</th>
                      <th>Commission</th>
                      <th>Booking Number</th>
                  </tr>
              </thead>
              <tbody>
                  @php $sl=1; @endphp
                  @foreach($commissions as $data)
                  <tr>
                      <td scope="row">{{$sl++}}</td>
                      <td scope="row">{{$data->created_at}}</td>
                      <td>{{$data->commission}}</td>
                      <td>{{$data->invoice_id}}</td>
                  </tr>
                  @endforeach
              </tbody>
          </table>

            <div class="row">
              <div class="col-sm-3">
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Total Commission</i></h6>
                {{$totalCommission}}
              </div>
              <div class="col-sm-9 text-secondary">
                  {{-- <h5>{{$total_commission}}</h5> --}}
            </div>
            </div>
            {{-- {{ $commission->links() }} --}}
        </div>
      </div>
    </div>
  </div>
  @endsection
