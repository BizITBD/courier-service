@extends('frontend.layouts.app')
@section('frontendcontent')
<div class="container">
    <div class="row">
        <br />
        <div class="col text-center">
            <h2>Blogs</h2><br>
            <p>{!! $blogData->footer_blog !!}</p>
        </div>
    </div>
</div>
@endsection
