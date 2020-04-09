@extends('layouts.app')

@section('title') Détails @endsection

@section('page_header')
@component('components.tournaments.page_header')
@endcomponent
@endsection

@section('content')
    <edit-page></edit-page>
@endsection
