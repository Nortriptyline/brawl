@extends('layouts.brawl')

@section('title')
Tournament
@endsection

@section('content')

<h2>
    Mes tournois
    <a href="{{ route('tournaments.create') }}"
        class="right btn-floating btn-large waves-effect waves-light blue">
        <i class="material-icons">add</i>
    </a>
</h2>

<list-tournaments @isset($trash) show_trashes="true" @endisset csrf="{{ csrf_token() }}"></list-tournaments>
@endsection
