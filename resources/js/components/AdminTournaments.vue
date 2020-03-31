<template>
  <div class="card large">
    <div class="row">
      <header>
        <div>
          <div class="right input-field col s6">
            <i class="material-icons prefix">search</i>
            <input id="icon_prefix" v-model="search" type="search" />
            <label for="icon_prefix">What are you looking for?</label>
          </div>
        </div>
      </header>
      <table class="card-content responsive-table highlight">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Ville</th>
            <th>Terrain</th>
            <th>Genre</th>
            <th class="center">Format</th>
            <th class="center">Places</th>
            <th class="center">Inscrits</th>
            <th>Date</th>
            <th>Heure</th>
            <th class="center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="tournament in displayed_tournaments" :key="tournament.id">
            <td>{{ tournament.name }}</td>
            <td>{{ tournament.city.name }}</td>
            <td>{{ tournament.field }}</td>
            <td>{{ tournament.genre }}</td>
            <td class="center">{{ tournament.team_size }}</td>
            <td class="center">{{ tournament.size }}</td>
            <td class="center">0</td>
            <td>{{ tournament.starting_date }}</td>
            <td>{{ tournament.starting_time }}</td>
            <td class="center">
              <!-- Edit -->
              <a
                :href="'/admin/tournaments/' + tournament.id + '/edit'"
                class="blue-text text-accent-3 waves-effect btn-small btn-flat white"
              >
                <i class="large material-icons">edit</i>
              </a>
              <!-- End edit -->
              <!-- Trash -->
              <a
                class="red-text text-accent-3 waves-effect btn-small btn-flat white"
                @click.prevent="trash(tournament.id)"
              >
                <i class="large material-icons">delete</i>
              </a>
              <form
                :id="'trash_' + tournament.id"
                :action="'/admin/tournaments/trash/' + tournament.id"
                style="display: none;"
                method="POST"
              >
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="_token" :value="csrf" />
              </form>
              <!-- End Trash -->
            </td>
          </tr>
        </tbody>
      </table>

      <ul class="pagination">
        <li class="waves-effect" :class="{ disabled: page <= 1 }">
          <a @click.prevent="setPage(page - 1)" href="#!"
            ><i class="material-icons">chevron_left</i></a
          >
        </li>
        <li
          v-for="p in last_page"
          :key="p"
          class="waves-effect"
          :class="{ active: pageIsActive(p), blue: pageIsActive(p) }"
        >
          <a @click.prevent="setPage(p)" href="#">{{ p }}</a>
        </li>
        <li class="waves-effect" :class="{ disabled: page >= last_page }">
          <a @click.prevent="setPage(page + 1)" href="#!"
            ><i class="material-icons">chevron_right</i></a
          >
        </li>
      </ul>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.pagination {
  position: absolute;
  bottom: 0;
}

.input-field {
  margin-bottom: 0;
}

tbody {
  overflow-y: scroll;
}
</style>

<script>
import tournamentApi from "../services/api/Tournament";

export default {
  data: function() {
    return {
      tournaments: [],
      search: "",
      nb_displayed_entries: 5,
      page: 1
    };
  },
  props: ["csrf"],
  methods: {
    getTournaments: () => tournamentApi.getMine(),
    setPage: function(page) {
      if (page > 0 && page <= this.last_page) {
        this.page = page;
      }
    },
    pageIsActive: function(page) {
      return page == this.page;
    },
    trash: function(id) {
      $("#trash_" + id).submit();
    }
  },
  computed: {
    searched_tournaments: function() {
      return this.tournaments.filter(tournament =>
        tournament.name.toLowerCase().includes(this.search.toLowerCase())
      );
    },
    displayed_tournaments: function() {
      // First element of the table to be displayed in the current page.
      var first_elmnt =
        this.page == 1 ? 0 : this.nb_displayed_entries * (this.page - 1);

      if (this.tournaments.length > 0) {
        return this.searched_tournaments.slice(
          first_elmnt,
          this.nb_displayed_entries * this.page
        );
      }
    },

    last_page: function() {
      return Math.ceil(
        this.searched_tournaments.length / this.nb_displayed_entries
      );
    }
  },
  mounted() {
    this.getTournaments().then(data => {
      this.tournaments = data;
      this.tournaments.sort(function(a, b) {
        return new Date(b.starting_date) - new Date(a.starting_date);
      });
    });
  }
};
</script>
