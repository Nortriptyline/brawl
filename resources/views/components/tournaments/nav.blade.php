<ul class="sidebanner grey lighten-4">
    <li class="header white">
        <span>{{ $tournament_name }}</span>
    </li>
    <li class="item dashboard"><a href="#">Dashboard</a></li>
    <div class="divider"></div>

    <ul class="category">
        <li class="title">Paramètres</li>
        <li class="item">
            <a href="{{ route('tournaments.edit.details', ['tournament' => $tournament->id]) }}">
                Détails
            </a>
        </li>
        <li class="item"><a href="">Autorisations</a></li>
    </ul>

    <ul class="category">
        <li class="title">Tournoi</li>
        <li class="item"><a href="">Paramètres</a></li>
        <li class="item"><a href="">Brackets</a></li>
        <li class="item"><a href="">Seeding</a></li>
    </ul>

    <ul class="category">
        <li class="title">Inscriptions</li>
        <li class="item"><a href="">Paramètres d'inscription</a></li>
        <li class="item"><a href="">Équipes</a></li>
    </ul>
</ul>
