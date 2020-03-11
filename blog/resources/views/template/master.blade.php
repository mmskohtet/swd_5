<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("css/all.css") }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
@include("template.nav")

<div class="container">
    <div class="row">
        <div class="col-12">
            @yield("content")
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
