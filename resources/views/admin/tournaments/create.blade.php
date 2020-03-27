@extends('layouts.admin')

@section('title')
Nouveau tournoi
@endsection

@section('content')

<div class="row">
    <form class="col s9" action={{ route('admin.tournaments.store') }} method="POST">
        @csrf
        <div class="card">
            <div class="card-content">
                <span class="card-title">Informations générales</span>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" name="name" type="text">
                        <label for="name">Nom</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" name="starting_date" class="datepicker" id="starting_date">
                        <label for="starting_date">Date</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" class="timepicker" id="starting_time">
                        <label for="starting_time">Heure de début</label>
                    </div>
                </div>
                <div class="row">
                    <search-city></search-city>
                    <div class="input-field col s6">
                        <input type="text" id="address" name="address">
                        <label for="address">Adresse</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Format du tournoi</span>
                <div class="row">
                    <div class="input-field col s4">
                        <input type="number" name="size" id="size">
                        <label for="size">Nombre d'équipes</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <select id="genre" name="genre">
                            <option value="mixed" selected>Mixte</option>
                            <option value="female">Féminin</option>
                            <option value="male">Masculin</option>
                        </select>
                        <label for="genre">Genre</label>
                    </div>
                    <div class="input-field col s4">
                        <select id="team_size" name="team_size">
                            <option value="2">2x2</option>
                            <option value="3">3x3</option>
                            <option value="4" selected>4x4</option>
                            <option value="6">6x6</option>
                        </select>
                        <label for="team_size">Taille de l'équipe</label>
                    </div>
                    <div class="input-field col s4">
                        <select id="field" name="field">
                            <option value="indoor" selected>Intérieur</option>
                            <option value="beach">Beach</option>
                            <option value="grass">Gazon</option>
                            <option value="snow">Neige</option>
                        </select>
                        <label for="field">Taille de l'équipe</label>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
        </div>
        <button class="btn btn-large right blue waves-effect waves-light" type="submit">Créer ce tournoi</button>
    </form>
</div>

</div>

@endsection
