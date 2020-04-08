<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    {{-- Icon --}}
    <link rel="icon" href="{{ asset('storage/brawl_logo.png') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body id="brawl">
    <div id="app">
        <header>
            <nav class="white hide-on-med-and-up">
                <div class="nav-wrapper">
                    <a href="#" data-target="main-nav" class="sidenav-trigger black-text"><i
                            class="material-icons">menu</i></a>
                    <h2 class="black-text">
                        @yield('title')
                    </h2>
                </div>
            </nav>
            <ul class="sidenav sidenav-fixed" id="main-nav">

                {{-- Home --}}
                <li class="{{ Route::currentRouteName() != 'home' ?: 'active'}}">
                    <a href="{{ route('home') }}" class="nav-tooltipped" data-tooltip="C'est la maison"
                        data-position="right">
                        <i class="material-icons">home</i>
                    </a>
                </li>

                <li>
                    <div class="divider"></div>
                </li>

                @auth
                {{-- Dashboard --}}
                <li class="{{ Route::currentRouteName() != 'dashboard' ?: 'active'}}">
                    <a href="{{ route('tournaments.dashboard') }}" class="nav-tooltipped" data-tooltip="Dashboard"
                        data-position="right">
                        <i class="material-icons">dashboard</i>
                    </a>
                </li>
                @endauth

                {{-- Search --}}
                <li data-target="searchModal">
                    <a class="modal-trigger nav-tooltipped" href="#search_modal" data-tooltip="Chercher tournoi"
                        data-position="right">
                        <i class="material-icons">search</i>
                    </a>
                </li>

                @auth
                {{-- Notificationq --}}
                <li class="{{ Route::currentRouteName() != 'home' ?: 'active'}}">
                    <a href="{{ route('home') }}" class="nav-tooltipped" data-tooltip="Notifications"
                        data-position="right">
                        <i class="material-icons">notifications</i>
                    </a>
                </li>

                <li>
                    <div class="divider"></div>
                </li>
                @endauth

                {{-- Tournaments --}}

                {{-- Create --}}
                <li class="{{ Route::currentRouteName() == 'tournaments.create' ? 'active blue' : ''}}">
                    <a href="{{ route('tournaments.create') }}" class="nav-tooltipped" data-tooltip="Créer un tournoi"
                        data-position="right">
                        <i class="material-icons">add</i>
                    </a>
                </li>

                {{-- Account dropdown --}}
                <li>
                    {{-- Dropdown trigger --}}
                    <a class="btn-flat dropdown-trigger" href="#" data-target="dropdown_account">
                        <i class="material-icons large">account_circle</i>
                    </a>

                    {{-- Dropdown content --}}
                    <ul id="dropdown_account" class="dropdown-content">
                        <li>
                            <a href="{{ route('settings.index') }}">
                                Profile
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('settings.index') }}">
                                Identifiants
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings.index') }}">
                                Notifications
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings.index') }}">
                                Tournois
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('settings.index') }}">
                                Requètes
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" class="red-text"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>
                            <form id="logout-form" style="display: none;" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </li>
            </ul>
            @yield('page_header')
        </header>

        <main>
            @yield('content')
        </main>

        @if (Session::has('toast'))
        <brawl-toast message="{{ Session::get('toast') }}"></brawl-toast>
        @endif

        <div class="modal bottom-sheet" id="search_modal">
            <brawl-search></brawl-search>
        </div>
        {{-- end Vuejs App --}}
    </div>


</body>

</html>
