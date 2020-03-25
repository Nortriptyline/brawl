@extends('layouts.admin')

@section('title')
Nouveau tournoi
@endsection

@section('content')

<div class="row">
    <form class="card col s9" action={{ route('admin.tournaments.create') }} method="POST">
        @csrf
        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text">
                <label for="name">Nom</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <input type="text" class="datepicker" id="starting_date">
                <label for="starting_date">Date</label>
            </div>
            <div class="input-field col s6">
                <input type="text" class="timepicker" id="starting_time">
                <label for="starting_time">Heure de début</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <search-city></search-city>
                <label for="city">Ville</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="text" id="address">
                <label for="address">Adresse</label>
            </div>
        </div>
        <div class="row">
        </div>
    </form>
</div>

</div>

@endsection
