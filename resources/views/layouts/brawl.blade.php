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

<body class="grey lighten-4">
    <div id="app">
        <header>
            <nav class="white">
                <div class="nav-wrapper">
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
                    <h2 class="black-text">
                        @yield('title')
                        <a class="right black-text" href="{{ route('home') }}">Retout au site</a>
                    </h2>
                </div>
            </nav>
            <ul class="sidenav sidenav-fixed" id="mobile-nav">

                <li class="logo">
                    <a id="main_logo" href="{{ route('home') }}">
                        <img src="{{ asset('storage/brawl_name_test.png') }}" alt="logo" />
                    </a>
                </li>

                {{-- Dashboards --}}
                <li class="{{ Route::currentRouteName() != 'home' ?: 'active'}}">
                    <a href="{{ route('home') }}">
                        <i class="material-icons">dashboard</i>
                        Dashboards
                    </a>
                </li>

                {{-- Collapsibles --}}
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        {{-- Tournaments --}}
                        <li
                            class="{{ strpos(Route::currentRouteName(), 'tournaments') !== false ? 'active' : ''}}">
                            <a class="collapsible-header waves-effect waves-teal">
                                <i class="material-icons">sports_volleyball</i>
                                Tournaments
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li
                                        class="{{ Route::currentRouteName() == 'tournaments.index' ? 'active blue' : ''}}">
                                        <a href="{{ route('tournaments.index') }}">Voir tous</a>
                                    </li>

                                    <li
                                        class="{{ Route::currentRouteName() == 'tournaments.create' ? 'active blue' : ''}}">
                                        <a href="{{ route('tournaments.create') }}">Créer</a>
                                    </li>

                                    <li
                                        class="{{ Route::currentRouteName() == 'tournaments.trashed' ? 'active blue' : ''}}">
                                        <a href="{{ route('tournaments.trashed') }}">Corbeille</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        {{-- Next --}}
                    </ul>
                </li>


                <li class="{{ Route::currentRouteName() != 'settings.index' ?: 'active'}}">
                    <a href="{{ route('settings.index') }}">
                        <i class="material-icons">settings</i>
                        Settings
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="material-icons">exit_to_app</i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" style="display: none;" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </header>

        <main class="">
            <div class="container">
                @yield('content')
            </div>
        </main>

        @if (Session::has('toast'))
        <brawl-toast message="{{ Session::get('toast') }}"></brawl-toast>
        @endif

        {{-- end Vuejs App --}}
    </div>
</body>

</html>
