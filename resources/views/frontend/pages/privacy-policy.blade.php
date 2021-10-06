@extends('frontend.layouts.app')
@section('frontendcontent')
<div class="container">
    <div class="row">
        <br />
        <div class="col text-center">
            <h2>Privacy Policy</h2><br>
            <p>{!! $policyData->footer_privacy !!}</p>
        </div>
    </div>
</div>
@endsection
