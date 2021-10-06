@extends('frontend.layouts.app')
@section('frontendcontent')

<html>

    <head>
      <link rel="stylesheet" href="/frontend-assets/assets/css/login.css">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <title>Sign in</title>
    </head>
    <style>
        .color{
            background: #fe7f0147;
        }
    </style>
    <body>
      <div class="login">
        <p class="sign" align="center">Sign in</p>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <form class="form1" method="POST" action="/userlogin">
            @csrf
          <input class="un color" type="Emali" align="center" placeholder="Email" name="email">
          <input class="pass un color" type="password" align="center" placeholder="Password" name="password">
          <button type="submit" class="submit"  align="center">Sign in</button>
        </form>
        </div>

    </body>

    </html>
    @endsection



