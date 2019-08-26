<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Stack Application</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

         <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/d70927c27e.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                /* background-color: #fff; */
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
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
    <body style="background-image: url('gradient_03.jpg');
                background-repeat:no-repeat;
                background-size:cover;">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" style="color:white !important"><i class="fas fa-home" style="padding-right:5px;"></i>Home</a>
                    @else
                        <a href="{{ route('login') }}" style="color:white !important">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="color:white !important">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content" style="background-color: rgba(255, 255, 255, 0.2); 
                                        text-align:center; 
                                        width:60%;
                                        max-width:60%; 
                                        display: inline-block;
                                        padding:30px 30px 0px 30px;
                                        color:#dddddd !important;">
                <div class="title m-b-md">
                <i class="fas fa-layer-group"></i>
                    Stack Application              
                </div>  
                <p> Stack Application built using Laravel PHP Framework and connects to a MySQL database. The application 
                    allows the System Administrator to manipulate the data stored in the database by enabling CRUD functionality (Create, Read, Update, Delete). 
                </p>
            </div>
        </div>
    </body>
</html>
