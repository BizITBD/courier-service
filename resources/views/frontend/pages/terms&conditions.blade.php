@extends('frontend.layouts.app')
@section('frontendcontent')
<div class="container">
    <div class="row">
        <br />
        <div class="col text-center">
            <h2>Terms & Conditions</h2><br>
            <p>{!! $termsData->footer_terms !!}</p>
        </div>
    </div>
</div>
@endsection
