<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page - Courier</title>
    <link rel="apple-touch-icon" href="/auth-assets/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/auth-assets/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/auth-assets/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/auth-assets/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="/auth-assets/app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/auth-assets/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/auth-assets/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/auth-assets/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/auth-assets/app-assets/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/auth-assets/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="/auth-assets/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/auth-assets/app-assets/css/pages/login-register.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/auth-assets/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 1-column   blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content container center-layout mt-2">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1"><img src="assets/images/logo@2x.png" alt="branding logo" style="width: 123px;"></div>
                                </div>
                                <strong></strong><h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Login with Daily Courier</span></h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal form-simple" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg" placeholder="Your Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            <div class="form-control-position">
                                                <i class="feather icon-user"></i>
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset><br>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input id="password" type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <div class="form-control-position">
                                                <i class="fa fa-key"></i>
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </fieldset>
                                        {{-- <div class="form-group row">
                                            <div class="col-sm-6 col-12 text-center text-sm-left">
                                                <fieldset class="text-center" >
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </fieldset>
                                            </div>
                                        </div> --}}
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="feather icon-unlock"></i> Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="/auth-assets/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="/auth-assets/app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="/auth-assets/app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
<script src="/auth-assets/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
<script src="/auth-assets/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/auth-assets/app-assets/js/core/app-menu.js"></script>
<script src="/auth-assets/app-assets/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="/auth-assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
<script src="/auth-assets/app-assets/js/scripts/forms/form-login-register.js"></script>
<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
