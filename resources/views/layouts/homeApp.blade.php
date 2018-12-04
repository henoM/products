<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>
    <title>User</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flag-icon.min.css') }}">
    <link href="{{ asset('assets/scss/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

</head>
<body>
@include('layouts.sidebar')
<div id="right-panel" class="right-panel">
    @include('layouts.header')
    @section('content')
        @yield('content')
    @show

</div>
<script>
    $('#myDropdown').on('show.bs.dropdown', function () {
        // do something…
    })
</script>

{{--<script src="{{ asset('assets/js/plugins.js') }}"></script>--}}
<script src="{{ asset('assets/js/main.js') }}"></script>
@stack('scripts')
</body>
</html>
