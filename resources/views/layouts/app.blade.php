<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dating Web App</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>


        html, body {
            background-image: url({{url('/img/love.jpg')}});
            opacity: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: rgba(255, 255, 255, 0.98);
            font-family: 'Nunito', sans-serif;
            font-weight: bold;
            height: 100vh;
            margin: 0;
        }

        .card-body-home{

            color: black;


        }


    </style>


</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light  shadow-sm  " style= "background-color: #ff5459">
        <div class="container">


            <a class="navbar-brand" style="color: white;font-size: 25px; font-weight: bold; font-family: 'Mongolian Baiti'" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <br>

            @guest
            @else

                <a class="navbar-brand" style="color: white;font-size: medium; font-weight: bold; font-family: 'Mongolian Baiti'" href="">
                    MENU
                </a>


                <a class="navbar-brand" style="color: white;font-size: medium; font-weight: bold; font-family: 'Mongolian Baiti'" href=" ">
                    MENU
                </a>









            @endguest




            <button class="navbar-toggler"  style="color: white"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item" >
                            <a class="nav-link" style="color: white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" style="color: white" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown" style="color: #2176bd" >
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:greenyellow; font-size: 18px; font-family: 'Times New Roman'" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right "   style="color: #2176bd;background-color: #2176bd">
                                <a class="dropdown-item" style="color: greenyellow;background-color: #2176bd" href="{{route('profile.user')}} ">

                                    User Account

                                </a>


                                <a class="dropdown-item" style="color: greenyellow;background-color: #2176bd" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>




                                <form     id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>


<footer style="vertical-align: text-bottom">
    <div class="container">
        <!--FOOTER DETAILS-->
        <p class="text-center" style="color: #070750;vertical-align: text-bottom; font-family: 'Times New Roman'" >
            All right reserved © Tanvir Hossen Bappy.


            <a href="https://github.com/thbappy7706" target="_blank">
                <strong class=" fa fa-github" style="color:#010103">GITHUB</strong>
            </a>

        </p>
    </div>
</footer>


</body>
</html>
