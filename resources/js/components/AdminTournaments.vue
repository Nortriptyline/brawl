<template>
    <div class="card">
        <header>
            <div class="row">
                <div class="input-field col offset-s6 s6">
                    <i class="material-icons prefix">search</i>
                    <input id="icon_prefix" v-model="search" type="search"/>
                    <label for="icon_prefix">What are you looking for?</label>
                </div>
            </div>
        </header>
        <table class="card-content responsive-table highlight">
            <thead>
                <tr>
                    <th>Nom</th>
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
                    <td>{{ tournament.field }}</td>
                    <td>{{ tournament.genre }}</td>
                    <td class="center">{{ tournament.team_size }}</td>
                    <td class="center">{{ tournament.size }}</td>
                    <td class="center">0</td>
                    <td>{{ tournament.starting_date }}</td>
                    <td>{{ tournament.starting_time }}</td>
                    <td class="center">
                        <a
                            class="blue-text text-accent-3 waves-effect btn-small btn-flat white"
                        >
                            <i class="large material-icons">edit</i>
                        </a>
                        <a
                            class="red-text text-accent-3 waves-effect btn-small btn-flat white"
                        >
                            <i class="large material-icons">delete</i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import tournamentApi from "../services/api/Tournament";

export default {
    data: function() {
        return {
            tournaments: [],
            search: '',
        };
    },
    methods: {
        getTournaments: () => tournamentApi.getMine()
    },
    computed: {
        displayed_tournaments: function() {
            if (this.tournaments.length > 0) {
                return this.tournaments.filter(tournament => tournament.name.toLowerCase().includes(this.search.toLowerCase()))
            }
        }
    },
    mounted() {
        this.getTournaments().then(data => {
            this.tournaments = data;
            this.tournaments.sort(function(a, b) {
                return new Date(b.starting_date) - new Date(a.starting_date)
            })
        });
    }
};
</script>
