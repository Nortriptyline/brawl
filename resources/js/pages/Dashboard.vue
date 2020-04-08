<template>
<div>
</div>
</template>

<script>
import { Bar } from "vue-chartjs";
import TournamentApi from '../services/api/Tournament';

export default {
  extends: Bar,
  data: function() {
    return {
        tournaments: []
    }
  },
  methods: {
      getTournaments: () => TournamentApi.getMine()
  },
  mounted() {
    this.getTournaments().then(data => {
        this.tournaments = data.sort(function(a, b) {
            return new Date(b.starting_date) - new Date(a.starting_date);
        })
    })
  }
};
</script>
