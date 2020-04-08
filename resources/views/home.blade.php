@extends('layouts.app')

@section('page_header')

<div class="hero blue-grey darken-4">
    <h1 class="white-text">
        <i class="material-icons medium">sports_volleyball</i>
        Brawl.com
    </h1>
    <div class="buttons">
        <button class="btn-flat btn-large waves-effect waves-light blue white-text">
            Créer un tournoi
        </button>
        <button class="btn-flat btn-large waves-effect white blue-text modal-trigger" data-target="search_modal">
            Chercher un tournoi
        </button>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    @auth
    <tournaments-slider title="Près de chez moi" path="recents" name="localized"></tournaments-slider>
    @endauth

    <tournaments-slider title="Most popular" path="recents" name="populats"></tournaments-slider>
    <tournaments-slider title="Latest" path="recents" name="latest"></tournaments-slider>
</div>
@endsection
