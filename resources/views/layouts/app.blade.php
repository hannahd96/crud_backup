<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="{{ asset('js/myjs.js') }}"></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css" >

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d70927c27e.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color: rgba(0, 0, 0, 0.4) !important;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-layer-group"></i>
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                           
                            <li> 
                                <a class="nav-link" style="padding-right:25px;" href="{{ url('about') }}">
                                    About
                                </a>
                            </li>
                            

                            @if(auth()->user()->isAdmin == 1)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-cogs" style="padding-right:8px;"></i>System Admin Control Panel
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('admin/routes') }}">Main Menu</a>
                                        <a class="dropdown-item" href="{{ route('questionnaires.index') }}">Manage Questionnaires</a>
                                        <a class="dropdown-item" href="{{ route('questions.index') }}">Manage Questions</a>
                                        <a class="dropdown-item" href="{{ route('users.index') }}">Manage Users</a>
                                    </div>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position:relative; padding-left:50px;" v-pre>

                                <img src="uploads/avatars/{{ Auth::user()->avatar }}" style="width:30px; height:30px; position:absolute; left:10px; border-radius:50%;">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                    @if(auth()->user()->isAdmin == 1)
                                      
                                        <a href="{{ url('/profile') }}" style="color:white !important; 
                                                                                padding-left:22px;
                                                                                font-size:12px;
                                                                                font-family: 'Roboto', sans-serif;"><i class="fas fa-user-shield"></i> PROFILE</a>
                                        <span class="caret"></span>
                                    @endif
                                    
                                    @if(auth()->user()->isAdmin !== 1)
                                  
                                            <a href="{{ url('/profile') }}" style="color:white !important; 
                                                                                    padding-left:22px; 
                                                                                    font-size:12px;
                                                                                    font-family: 'Roboto', sans-serif;"><i class="fas fa-user"></i> PROFILE</a>
                                        <span class="caret"></span>
                                    @endif

                                    </a>  
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
        <br><br><br><br><br>
            @yield('content')
        </main>
    </div>
</body>
</html>
