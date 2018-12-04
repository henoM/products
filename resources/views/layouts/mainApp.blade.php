<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Products</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flag-icon.min.css') }}">
    <link href="{{ asset('assets/scss/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Styles -->
    <style>
        .menu-area {
            background: black
        }

        .dropdown-menu {
            padding: 0;
            margin: 0;
            border: 0 solid transition !important;
            border: 0 solid rgba(0, 0, 0, .15);
            border-radius: 0;
            -webkit-box-shadow: none !important;
            box-shadow: none !important
        }

        .mainmenu a, .navbar-default .navbar-nav > li > a, .mainmenu ul li a, .navbar-expand-lg .navbar-nav .nav-link {
            color: #fff;
            font-size: 16px;
            text-transform: capitalize;
            padding: 16px 15px;
            font-family: 'Roboto', sans-serif;
            display: block !important;
        }

        .mainmenu .active a, .mainmenu .active a:focus, .mainmenu .active a:hover, .mainmenu li a:hover, .mainmenu li a:focus, .navbar-default .navbar-nav > .show > a, .navbar-default .navbar-nav > .show > a:focus, .navbar-default .navbar-nav > .show > a:hover {
            color: #fff;
            background: #4CAF50;
            outline: 0;
        }

        /*==========Sub Menu=v==========*/
        .mainmenu .collapse ul > li:hover > a {
            background: black;
        }

        .mainmenu .collapse ul ul > li:hover > a, .navbar-default .navbar-nav .show .dropdown-menu > li > a:focus, .navbar-default .navbar-nav .show .dropdown-menu > li > a:hover {
            background: #4CAF50;
        }

        .mainmenu .collapse ul ul ul > li:hover > a {
            background: #4CAF50;
        }

        .mainmenu .collapse ul ul, .mainmenu .collapse ul ul.dropdown-menu {
            background: black;
        }

        .mainmenu .collapse ul ul ul, .mainmenu .collapse ul ul ul.dropdown-menu {
            background: black
        }

        .mainmenu .collapse ul ul ul ul, .mainmenu .collapse ul ul ul ul.dropdown-menu {
            background: black
        }

        /******************************Drop-down menu work on hover**********************************/
        .mainmenu {
            background: none;
            border: 0 solid;
            margin: 0;
            padding: 0;
            min-height: 20px;
            width: 100%;
        }

        @media only screen and (min-width: 767px) {
            .mainmenu .collapse ul li:hover > ul {
                display: block
            }

            .mainmenu .collapse ul ul {
                position: absolute;
                top: 100%;
                left: 0;
                min-width: 250px;
                display: none
            }

            /*******/
            .mainmenu .collapse ul ul li {
                position: relative
            }

            .mainmenu .collapse ul ul li:hover > ul {
                display: block
            }

            .mainmenu .collapse ul ul ul {
                position: absolute;
                top: 0;
                left: 100%;
                min-width: 250px;
                display: none
            }

            /*******/
            .mainmenu .collapse ul ul ul li {
                position: relative
            }

            .mainmenu .collapse ul ul ul li:hover ul {
                display: block
            }

            .mainmenu .collapse ul ul ul ul {
                position: absolute;
                top: 0;
                left: -100%;
                min-width: 250px;
                display: none;
                z-index: 1
            }

        }

        @media only screen and (max-width: 767px) {
            .navbar-nav .show .dropdown-menu .dropdown-menu > li > a {
                padding: 16px 15px 16px 35px
            }

            .navbar-nav .show .dropdown-menu .dropdown-menu .dropdown-menu > li > a {
                padding: 16px 15px 16px 45px
            }
        }
    </style>
</head>
<body>
<div id="menu_area" class="menu-area">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-light navbar-expand-lg mainmenu">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="active"><a href="{{ route('main') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li style="margin-left: 20px" class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($categories as $category)
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" href="{{ route('category.get', $category->id) }}"
                                           id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false">{{$category->category}}</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach($category->subcategories as $subcategory)
                                                <li>
                                                    <a href="{{ route('subcategory.get',$subcategory->id) }}">{{$subcategory->subcategory}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li style="margin-left: 20px"><a href="{{ route('login') }}">Login</a></li>
                        <li style="margin-left: 20px"><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
@section('content')
    @yield('content')
@show
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
