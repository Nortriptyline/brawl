@extends('layouts.app')

@section('title') Détails @endsection
@section('page_header')
<nav class="white hide-on-small-only">
    <div class="nav-wrapper">
        <a href="#" data-target="mobile-nav" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
        <h2 class="black-text">
            @yield('title')
        </h2>
    </div>
</nav>
@endsection

@section('content')
@component('components.nav')

@endcomponent
@endsection
