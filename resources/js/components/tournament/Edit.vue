<template>
  <div>
    <ul class="sidebanner grey lighten-4">
      <li class="header white">
        <!-- <span>{{ $tournament_name }}</span> -->
      </li>
      <li class="item dashboard"><a href="#">Dashboard</a></li>
      <div class="divider"></div>

      <ul class="category">
        <li class="title">Paramètres</li>
        <li class="item">
          <a @click.prevent="setCurrentTab('tournament-settings')">
            Détails
          </a>
        </li>
        <li class="item">
          <a @click.prevent="setCurrentTab('tournament-otherTag')"
            >Autorisations</a
          >
        </li>
      </ul>

      <ul class="category">
        <li class="title">Tournoi</li>
        <li class="item active"><a href="">Paramètres</a></li>
        <li class="item"><a href="">Brackets</a></li>
        <li class="item"><a href="">Seeding</a></li>
      </ul>

      <ul class="category">
        <li class="title">Inscriptions</li>
        <li class="item"><a href="">Paramètres d'inscription</a></li>
        <li class="item"><a href="">Équipes</a></li>
      </ul>
    </ul>

    <div class="container extended">
      <keep-alive>
        <tournament-settings v-bind:is="currentTab"> </tournament-settings>
      </keep-alive>
    </div>
  </div>
</template>
<script>
import tournamentApi from "../../services/api/Tournament";

export default {
  data() {
    return {
      id: 0,
      tournament: {},
      currentTab: "tournament-settings"
    };
  },
  methods: {
    getTournament: id => tournamentApi.get(id),
    setCurrentTab: function(tab) {
      this.currentTab = tab;
    }
  },
  mounted() {
    this.id = location.pathname.split("/")[2];
    this.getTournament(this.id).then(tournament => {
      this.tournament = tournament;
    });
  }
};
</script>
