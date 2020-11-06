<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pexcon Cart||A Category Store Based Application</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css " rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-image: url({{url('/img/love.jpg')}});
            opacity: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: rgba(255, 22, 53, 0.98);
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 110vh;
            margin: 10px;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 30px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
        }
        .links > a {
            color: #ff5a47;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}"></a>
            @else
                <a href="{{ route('login') }}"></a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"></a>
                @endif
            @endauth
        </div>
    @endif


    <div class="content">
        <div class="title m-b-md" style="font-family: 'Times New Roman';text-decoration: #2176bd; font-weight: bold; font-size: 40px; text-shadow: #1d68a7">
          WELCOME TO THE  DATING &#x2764 SITE
        </div>

        <br>
        <br>


        <div class="links"  style="font-family: 'Times New Roman'">

            @if (Route::has('login'))

                @auth
                    <a href="{{ url('/home') }}" style="font-size: 28px;font-family: 'Times New Roman';color: darkblue">Home</a>
                @else
                    <a href="{{ route('login') }}" style="font-size: 28px;font-family: 'Times New Roman' ;color: #3119f4">SIGN IN</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" style="font-size: 28px;font-family: 'Times New Roman' ;color: #4c110f">SIGN UP</a>
                    @endif
                @endauth





        </div>
        @endif




    </div>
</div>
</body>
</html>
