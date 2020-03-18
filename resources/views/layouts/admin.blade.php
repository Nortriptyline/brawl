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

<body>
    <div id="app">

        <ul id="slide-out" class="sidenav sidenav-fixed">
            <li>Logo</li>
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li><a href="#!">First Sidebar Link</a></li>
                    <li><a href="#!">Second Sidebar Link</a></li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header">Dropdown<i class="material-icons">arrow_drop_down</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="#!">First</a></li>
                                        <li><a href="#!">Second</a></li>
                                        <li><a href="#!">Third</a></li>
                                        <li><a href="#!">Fourth</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="collapsible-header">Dropdown<i class="material-icons">arrow_drop_down</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="#!">First</a></li>
                                        <li><a href="#!">Second</a></li>
                                        <li><a href="#!">Third</a></li>
                                        <li><a href="#!">Fourth</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
