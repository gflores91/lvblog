<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ env('APP_NAME') }} </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
</head>

<body>
    <div class="main" id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('home.index') }}">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item {{ url()->current() == route('home.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home.index') }}">@lang('app.Home') <span class="sr-only">(current)</span></a>
                    </li>
                    @if(auth()->check())
                    <li class="nav-item {{ url()->current() == route('noticia.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('noticia.index') }}">@lang('app.News') <span class="sr-only">(current)</span></a>
                    </li>
                    @endif
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    @if(app()->getLocale() == 'es')
                    <li class="nav-item">
                        <a class="nav-link" href="/locale?lang=en">English</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="/locale?lang=es">Español</a>
                    </li>
                    @endif
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item {{ url()->current() == route('login') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('login') }}">@lang('app.Login')</a>
                    </li>
                    <li class="nav-item {{ url()->current() == route('register') ? 'active' : '' }}">
                        @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">@lang('app.Register')</a>
                        @endif
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                            aria-expanded="false">@lang('app.Notifications')
                            <span class="bagde badge-primary">{{ auth()->user()->notifications->count() }}</span>
                        </a>
                        <notificaciones-component :user="{{ auth()->user()->id }}"></notificaciones-component>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                @lang('app.Logout')
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ mix('js/app.js') }}"></script>



</body>

</html>
