<template>
  <div>
    <header>
      <div>
        <!-- Search -->
        <div class="right input-field col s6">
          <i class="material-icons prefix">search</i>
          <input id="icon_prefix" v-model="search" type="search" />
          <label for="icon_prefix">What are you looking for?</label>
        </div>
      </div>
    </header>

    <!--table -->
    <table class="responsive-table highlight">
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
          <th class="center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="tournament in displayed_tournaments" :key="tournament.id">
          <td>{{ tournament.name }}</td>
          <td>{{ tournament.city.name }}</td>
          <td>{{ tournament.tsetting.field }}</td>
          <td>{{ tournament.tsetting.genre }}</td>
          <td class="center">{{ tournament.tsetting.team_size }}</td>
          <td class="center">{{ tournament.tsetting.size }}</td>
          <td class="center">0</td>
          <td>{{ tournament.starting_date }}</td>
          <td class="center">
            <!-- Edit new -->
            <tooltip-button
              v-if="!show_trashes"
              :path="'/tournaments/' + tournament.id + '/edit'"
              color="blue"
              text_color="white-text"
              btn_style="btn-flat"
              btn_size="btn-small"
              position="top"
              data="Édition"
            >
              <i class="large material-icons">edit</i>
            </tooltip-button>
            <!-- End edit -->

            <tooltip-button
              :color="show_trashes ? 'amber' : 'red'"
              text_color="white-text"
              btn_style="btn-flat"
              btn_size="btn-small"
              position="top"
              is_submit="true"
              :data="show_trashes ? 'Récupérer' : 'Corbeille'"
              v-on:send_form="trash(tournament.id)"
            >
              <i class="large material-icons">{{ action_icon }}</i>
            </tooltip-button>

            <form
              :id="'trash_' + tournament.id"
              :action="form_url + tournament.id"
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

    <!-- Actions -->
    <div v-if="pagination" class="">
      <!-- Paginatoin -->
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
//   position: relative;
  padding-top: 25px;
  bottom: 0;
}

.input-field {
  margin-bottom: 0;
}
</style>

<script>
import tournamentApi from "../services/api/Tournament";

export default {
  data: function() {
    return {
      tournaments: [],
      search: "",
      page: 1
    };
  },
  props: ["csrf", "show_trashes", "pagination", "entries"],
  methods: {
    getTournaments: function() {
      if (this.show_trashes) {
        return tournamentApi.getMyTrash();
      } else {
        return tournamentApi.getMine();
      }
    },
    setPage: function(page) {
      if (page > 0 && page <= this.last_page) {
        this.page = page;
      }
    },
    pageIsActive: function(page) {
      return page == this.page;
    },
    trash: function(id) {
      console.log("here");
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
        this.page == 1 ? 0 : this.entries * (this.page - 1);

      if (this.tournaments.length > 0) {
        return this.searched_tournaments.slice(
          first_elmnt,
          this.entries * this.page
        );
      }
    },
    last_page: function() {
      return Math.ceil(
        this.searched_tournaments.length / this.entries
      );
    },
    form_url: function() {
      var action = this.show_trashes ? "restore" : "trash";
      var path = "/tournaments/" + action + "/";
      return path;
    },
    action_icon: function() {
      return this.show_trashes ? "restore" : "delete";
    }
  },
  watch: {
    search: function() {
      if (this.page != 1) {
        this.setPage(1);
      }
    }
  },
  mounted() {
    this.entries = this.entries ?? 5;
    this.getTournaments().then(data => {
      this.tournaments = data;
      this.tournaments.sort(function(a, b) {
        return new Date(b.starting_date) - new Date(a.starting_date);
      });
    });
  }
};
</script>
