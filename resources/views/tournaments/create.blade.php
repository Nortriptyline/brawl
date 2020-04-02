@extends('layouts.brawl')

@section('title')
Nouveau tournoi
@endsection

@section('content')

<div class="row">
    @empty($tournament)
    {{-- Creation mode --}}
    <form class="col s9" action={{ route('tournaments.store') }} method="POST">
    @else
    {{-- Edition mode --}}
    <form class="col s9" action={{ route('tournaments.update', $tournament->id) }} method="POST">
        @method('PUT')

    @endisset

        @csrf
        <div class="card">
            <div class="card-content">
                <span class="card-title">Informations générales</span>
                <div class="row">
                    <div class="input-field col s12">
                        {{-- Name --}}
                        <input id="name" name="name" type="text" class="validate" minlength="3" maxlength="255" required
                            @isset($tournament)value="{{ $tournament->name }}" @endisset>
                        <label for="name">Nom</label>
                        <span class="helper-text" data-error="Veuillez entrer entre 3 et 255 caractères"></span>
                        @error('name')
                        <span class="helper-text red-text">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    {{-- Starting date --}}
                    <brawl-datepicker @isset($tournament) date="{{ $tournament->starting_date }}" @endisset>
                    </brawl-datepicker>
                    {{-- Starting time --}}
                    <div class="input-field col s6">
                        <input type="text" class="timepicker" name="starting_time" id="starting_time"
                            @isset($tournament) value="{{ $tournament->starting_time }}" @endisset>
                        <label for="starting_time">Heure de début</label>
                    </div>
                </div>
                <div class="row">
                    {{-- City --}}
                    <search-city @isset($tournament)city="{{ $tournament->city }}"@endisset></search-city>
                    <div class="input-field col s6">
                        <input type="text" id="address" name="address" @isset($tournament)
                            value="{{ $tournament->address }}" @endisset>
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
                        <input type="number" name="size" id="size" @isset($tournament) value="{{ $tournament->size }}"
                            @endisset>
                        <label for="size">Nombre d'équipes</label>
                    </div>
                </div>
                <div class="row">
                    {{-- Genre --}}
                    <div class="input-field col s4">
                        <select id="genre" name="genre">
                            <option @if (isset($tournament) && $tournament->genre === 'mixed')
                                selected
                                @endif
                                value="mixed">Mixte</option>
                            <option @if (isset($tournament) && $tournament->genre === 'female')
                                selected
                                @endif
                                value="female">Féminin</option>
                            <option @if (isset($tournament) && $tournament->genre === 'male')
                                selected
                                @endif
                                value="male">Masculin</option>
                        </select>
                        <label for="genre">Genre</label>
                    </div>
                    {{-- Team size --}}
                    <div class="input-field col s4">
                        <select id="team_size" name="team_size">
                            <option @if (isset($tournament) && $tournament->team_size == 2)
                                selected
                                @endif value="2">2x2</option>
                            <option @if (isset($tournament) && $tournament->team_size == 3)
                                selected
                                @endif value="3">3x3</option>

                                {{-- 4x4 is default format --}}
                            <option @if (isset($tournament) && $tournament->team_size == 4)
                                selected
                                @endif @empty($tournament) selected @endempty value="4">4x4</option>
                            <option @if (isset($tournament) && $tournament->team_size == 6)
                                selected
                                @endif value="6">6x6</option>
                        </select>
                        <label for="team_size">Taille de l'équipe</label>
                    </div>

                    {{-- Field --}}
                    <div class="input-field col s4">
                        <select id="field" name="field">
                            <option @if (isset($tournament) && $tournament->field == 'indoor')
                                selected
                                @endif value="indoor">Intérieur</option>
                            <option @if (isset($tournament) && $tournament->field == 'beach')
                                selected
                                @endif value="beach">Beach</option>
                            <option @if (isset($tournament) && $tournament->field == 'grass')
                                selected
                                @endif value="grass">Gazon</option>
                            <option @if (isset($tournament) && $tournament->field == 'snow')
                                selected
                                @endif value="snow">Neige</option>
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
