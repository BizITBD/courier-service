@extends('frontend.layouts.app')
@section('frontendcontent')
<div class="container">
    <div class="row">
        <br />
        <div class="col text-center">
            <h2>About Us</h2><br>
            <p>{!! $aboutData->footer_about !!}</p>
        </div>
    </div>
</div>
@endsection
