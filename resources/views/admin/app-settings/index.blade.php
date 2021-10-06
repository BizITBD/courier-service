@extends('layouts.app')
@section('content')
<h3>Settings</h3>

<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">Update Your Application Settings</div>
    </div>
    <form role="form" class="form-horizontal" action="{{route('app_settings.update',$settinsdata->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group col-md-12">
                    <div class="col-sm-12">
                        <label for="name" class="control-label">Invoice Terms And Conditons</label>
                        <textarea type="text" class="form-control"  id="terms_and_conditions" name="terms_and_conditions">{{$settinsdata->terms_and_conditions}}</textarea>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                       <center>
                           <label for="profile_photo" class="control-label">Banner Logo</label>
                           <input type="file" class="form-control" id="banner_picture" name="banner_picture" onchange="readURL(this);"><br>
                           <div class="fileinput-new thumbnail" style="height: 140px; width:140px">
                                <img id="previmage" src="{{$settinsdata->banner_picture ? '/' . $settinsdata->banner_picture :  '/frontend-assets/assets/img/bg6.jpg'}}">
                            </div>
                        </div>
                        </center>
                </div>
                <br><br><hr>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                       <center>
                           <label for="profile_photo" class="control-label">Company Logo</label>
                           <input type="file" class="form-control" id="company_logo" name="company_logo" onchange="readURLC(this);"><br>
                           <div class="fileinput-new thumbnail" style="height: 140px; width:140px">
                                <img id="previmage-c" src="{{$settinsdata->company_logo ? '/' . $settinsdata->company_logo :  '/frontend-assets/assets/img/bg6.jpg'}}">
                            </div>
                        </center>
                    </div>
                </div><br><br><hr>
                <div class="form-group col-md-12">
                    <div class="col-sm-7">
                       <center>
                           <label for="fav_icon" class="control-label">Fav Icon</label>
                           <input type="file" class="form-control" id="fav_icon" name="fav_icon" onchange="readURLf(this);"><br>
                           <div class="fileinput-new thumbnail" style="height: 140px; width:140px">
                                <img id="previmage-f" src="{{$settinsdata->fav_icon ? '/' . $settinsdata->fav_icon :  '/frontend-assets/assets/img/bg6.jpg'}}">
                            </div>
                        </center>
                    </div>
                </div>


                <div class="form-group col-md-12">
                    <div class="col-sm-12">
                        <label for="name" class="control-label">Footer About</label>
                        <textarea type="text" class="form-control"  id="footer_about" name="footer_about">{{$settinsdata->footer_about}}</textarea>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-sm-12">
                        <label for="footer_privacy" class="control-label">Footer Privacy</label>
                        <textarea type="text" class="form-control"  id="footer_privacy" name="footer_privacy">{{$settinsdata->footer_privacy}}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group col-md-12">
                    <div class="col-sm-12">
                        <label for="name" class="control-label">Banner Text</label>
                        <textarea type="text" class="form-control" id="banner_text" name="banner_text">{{$settinsdata->banner_text}}</textarea>
                    </div>
                </div><br><br>
                <div class="form-group col-md-12">
                    <div class="col-sm-12"><h3>Delivery Counter Settings</h3></div>
                    <div class="col-sm-12">
                        <label for="count_rorder" class="control-label">Counter Order</label>
                        <input type="text" id="count_rorder" name="count_rorder" value="{{$settinsdata->count_rorder}}" class="form-control">
                    </div>
                    <div class="col-sm-12">
                        <label for="count_pending" class="control-label">Counter Pending</label>
                        <input type="text" id="count_pending" name="count_pending" value="{{$settinsdata->count_pending}}" class="form-control">
                    </div>
                    <div class="col-sm-12">
                        <label for="count_delivery" class="control-label">Counter Delivery</label>
                        <input type="text" name="count_delivery" id="count_delivery" class="form-control" value="{{$settinsdata->count_delivery}}">
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="name" class="control-label">Footer Blog</label>
                    <textarea type="text" class="form-control" id="footer_blog" name="footer_blog">{{$settinsdata->footer_blog}}</textarea>
                </div>
                <div class="col-sm-12">
                    <label for="name" class="control-label">Footer Terms & Conditions</label>
                    <textarea type="text" class="form-control" id="footer_terms" name="footer_terms">{{$settinsdata->footer_terms}}</textarea>
                </div>


                <br><br>
                <div class="form-group col-md-12">
                    <div class="col-sm-12"><h3>Banner Text</h3></div>
                    <div class="col-sm-12">
                        <label for="banner1" class="control-label">Text - 1</label>
                        <input type="text" id="banner1" name="banner1" value="{{$settinsdata->banner1}}" class="form-control">
                    </div>
                    <div class="col-sm-12">
                        <label for="banner2" class="control-label">Text - 2</label>
                        <input type="text" id="banner2" name="banner2" value="{{$settinsdata->banner2}}" class="form-control">
                    </div>
                    <div class="col-sm-12">
                        <label for="banner3" class="control-label">Text - 3</label>
                        <input type="text" name="banner3" id="banner3" class="form-control" value="{{$settinsdata->banner3}}">
                    </div>
                </div>


            </div>
            </div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
</div>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function(){
    CKEDITOR.replace('terms_and_conditions');
    CKEDITOR.replace('banner_text');
    CKEDITOR.replace('footer_about');
    CKEDITOR.replace('footer_blog');
    CKEDITOR.replace('footer_terms');
    CKEDITOR.replace('footer_privacy');
});
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previmage')
                    .attr('src', e.target.result)
                    .width(140)
                    .height(140);
                };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURLC(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previmage-c')
                    .attr('src', e.target.result)
                    .width(140)
                    .height(140);
                };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURLf(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previmage-f')
                    .attr('src', e.target.result)
                    .width(140)
                    .height(140);
                };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
