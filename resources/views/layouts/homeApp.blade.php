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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>.third-level-menu
    {
        position: absolute;
        top: 0;
        right: -150px;
        width: 150px;
        list-style: none;
        padding: 0;
        margin: 0;
        display: none;
    }

    .third-level-menu > li
    {
        height: 30px;
        background: #999999;
    }
    .third-level-menu > li:hover { background: #CCCCCC; }

    .second-level-menu
    {
        position: absolute;
        top: 30px;
        left: 0;
        width: 150px;
        list-style: none;
        padding: 0;
        margin: 0;
        display: none;
    }

    .second-level-menu > li
    {
        position: relative;
        height: 30px;
        background: #999999;
    }
    .second-level-menu > li:hover { background: #CCCCCC; }

    .top-level-menu
    {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .top-level-menu > li
    {
        position: relative;
        float: left;
        height: 30px;
        width: 150px;
        background: #999999;
    }
    .top-level-menu > li:hover { background: #CCCCCC; }

    .top-level-menu li:hover > ul
    {
        /* On hover, display the next level's menu */
        display: inline;
    }


    /* Menu Link Styles */

    .top-level-menu a /* Apply to all links inside the multi-level menu */
    {
        font: bold 14px Arial, Helvetica, sans-serif;
        color: #FFFFFF;
        text-decoration: none;
        padding: 0 0 0 10px;

        /* Make the link cover the entire list item-container */
        display: block;
        line-height: 30px;
    }
    .top-level-menu a:hover { color: #000000; }</style>
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
    var expanded = false;

    function showCheckboxes() {
        var checkbox = document.getElementById("checkbox");
        if (!expanded) {
            checkbox.style.display = "block";
            expanded = true;
        }
        else {
            checkbox.style.display = "none";
            expanded = false;
        }
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
{{--<script src="{{ asset('assets/js/plugins.js') }}"></script>--}}
<script src="{{ asset('assets/js/main.js') }}"></script>
@stack('scripts')
</body>
</html>
