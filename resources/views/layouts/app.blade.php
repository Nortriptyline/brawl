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
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger black-text"><i
                            class="material-icons">menu</i></a>
                    <h2 class="black-text">
                        @yield('title')
                        <a class="right black-text" href="{{ route('home') }}">Retout au site</a>
                    </h2>
                </div>
            </nav>
            <ul class="sidenav sidenav-fixed" id="mobile-nav">

                {{-- Home --}}
                <li class="{{ Route::currentRouteName() != 'home' ?: 'active'}}">
                    <a href="{{ route('home') }}">
                        <i class="material-icons">home</i>
                    </a>
                </li>
                <li>
                    <div class="divider"></div>
                </li>
                {{-- Search --}}
                <li data-target="searchModal">
                    <a class="modal-trigger" href="#search_modal">
                        <i class="material-icons">search</i>
                    </a>
                </li>

                <div class="divider"></div>

                {{-- Tournaments --}}
                <li class="{{ Route::currentRouteName() == 'tournaments.index' ? 'active blue' : ''}}">
                    <a href="{{ route('tournaments.index') }}">Voir tous</a>
                </li>

                <li class="{{ Route::currentRouteName() == 'tournaments.create' ? 'active blue' : ''}}">
                    <a href="{{ route('tournaments.create') }}">Créer</a>
                </li>

                <li class="{{ Route::currentRouteName() == 'tournaments.trashed' ? 'active blue' : ''}}">
                    <a href="{{ route('tournaments.trashed') }}">Corbeille</a>
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

        <main class="">
            <div class="container">

                @yield('content')
            </div>
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
