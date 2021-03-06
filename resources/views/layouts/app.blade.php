<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{'CMS' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
                body {
                font-family: "Lato", sans-serif;
                }

                .sidenav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #111;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
                }

                .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s;
                }

                .sidenav a:hover {
                color: #f1f1f1;
                }

                .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
                }

                @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
                .sidenav a {font-size: 18px;}
                }
                </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ 'Readit_App' }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
       @auth 
            <div class="container">
                <div class="row" wdith="50">
                        <div class="col-md-3">
                            <ul class="list-group">
                            <li class="list-group-item">
                                 <a href="/"> Home</a>
                                </li>
                            @can('showMune')
                                <li class="list-group-item">
                                        <a href="/dashboard"> Dashboard</a>
                                </li>

                                <li class="list-group-item">
                                        <a href="/users"> Users</a>
                                </li>

                                <li class="list-group-item">
                                        <a href="/message"> message</a>
                                </li>
                                <li class="list-group-item">
                                        <a href="/posts/trashed"> Trashed Posts</a>
                                    </li>
                        @endcan
                                
                                <li class="list-group-item">
                                            <a href="/posts"> posts</a>
                                </li>
                                    <li class="list-group-item">
                                        <a href="/Categories">Categories</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="/Tags">Tags</a>
                                    </li>
                                    <li class="list-group-item">
                                            <a  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logut') }}
                                            </a>
                                    </li>

                                    
                                  

                                
                            </ul>
                        </div>
                        <div class="col-md -4 py-4">
                            <main class="py-8">
                            @yield('content')
                            </main>
                        </div>
                        
                </div>
                </div>
       @else 
                        <main class="py-8">
                            @yield('content')
                            </main>
       @endauth

       
    </div>


    
</body>
</html>
