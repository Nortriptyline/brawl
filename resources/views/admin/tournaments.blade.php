@extends('layouts.admin')

@section('title')
Tournament
@endsection

@section('content')

<h2>
    Mes tournois
    <a href="{{ route('admin.tournaments.create') }}"
        class="right btn-floating btn-large waves-effect waves-light blue">
        <i class="material-icons">add</i>
    </a>
</h2>

<admin-tournaments @isset($trash) show_trashes="true" @endisset csrf="{{ csrf_token() }}"></admin-tournaments>
@endsection
