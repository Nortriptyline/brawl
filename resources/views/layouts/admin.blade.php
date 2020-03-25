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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body id="admin" class="grey lighten-4">
    <div id="app">
        <header>
            <nav class="white">
                <div class="nav-wrapper">
                    <h2 class="black-text">
                        @yield('title')
                    </h2>
                    <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                </div>
            </nav>
            <ul class="sidenav sidenav-fixed" id="mobile-nav">

                {{-- Dashboards --}}
                <li class="{{ Route::currentRouteName() != 'admin.home' ?: 'active'}}">
                    <a href="{{ route('admin.home') }}">Dashboards</a>
                </li>

                {{-- Collapsibles --}}
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        {{-- Tournaments --}}
                        <li class="{{ strpos(Route::currentRouteName(), 'admin.tournaments') !== false ? 'active' : ''}}">
                            <a class="collapsible-header waves-effect waves-teal">Tournaments</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li class="{{ Route::currentRouteName() == 'admin.tournaments.index' ? 'active blue' : ''}}">
                                        <a href="{{ route('admin.tournaments.index') }}">Voir tous</a>
                                    </li>

                                    <li
                                        class="{{ Route::currentRouteName() == 'admin.tournaments.create' ? 'active blue' : ''}}">
                                        <a href="{{ route('admin.tournaments.create') }}">Créer</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        {{-- Next --}}
                    </ul>
                </li>


                <li class="{{ Route::currentRouteName() != 'admin.settings.index' ?: 'active'}}">
                    <a href="{{ route('admin.settings.index') }}">Settings</a>
                </li>
            </ul>
        </header>

        <main class="">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
