<template>
  <div class="input-field col s6">
    <input type="text" v-model="term" id="city" class="autocomplete" />
    <label for="city">Ville / Code postal</label>
  </div>
</template>

<script>
import cityApi from "../services/api/City";

export default {
  data: function() {
    return {
      cities: [],
      term: "",
      selected: {},
      zip: ""
    };
  },
  methods: {
    search: function(term) {
      cityApi.search(term).then(data => {
        this.cities = data;
        var instance = M.Autocomplete.getInstance($("input.autocomplete"));
        instance.updateData(this.builtCities);
        instance.open();
      });
    }
  },
  computed: {
    builtCities: function() {
      var cities = {};

      this.cities.forEach(city => {
        cities[city.name + " " + city.zip_code] = city;
      });

      return cities;
    }
  },
  watch: {
    term: function(term) {
      this.search(term);
    }
  },
  mounted() {
    $(document).ready(function() {
      $("input.autocomplete").autocomplete({
        data: {}
      });
    });
  }
};
</script>
