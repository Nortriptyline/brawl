<template>
  <div class="input-field col s6">
    <input
      type="text"
      v-model="term"
      name="city_name"
      id="city_name"
      class="autocomplete"
      autocomplete="off"
    />
    <label for="city_name">Ville / Code postal</label>

    <input id="city" v-model="city" type="hidden" name="city" />
  </div>
</template>

<script>
import cityApi from "../services/api/City";

export default {
  data: function() {
    return {
      cities: [],
      citiesId: [],
      city: "",
      term: ""
    };
  },
  methods: {
    search: function(term) {
      cityApi.search(term).then(data => {

          if (!this.citiesId.hasOwnProperty(term)) {
              this.cities = data;
              var instance = M.Autocomplete.getInstance($("input.autocomplete"));
              instance.updateData(this.displayedCities);
              instance.open();
          }
      });
    },
    setCity: function(city) {
      this.city =
        this.citiesId[city] !== "undefined" ? this.citiesId[city] : null;
    }
  },
  computed: {
    displayedCities: function() {
      var cities = {};

      this.cities.forEach(city => {
        var key = city.name + " " + city.zip_code;
        cities[key] = null;
        this.citiesId[key] = city.id;
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
    var that = this;
    $(document).ready(function() {
      $("input.autocomplete").autocomplete({
        data: {},
        onAutocomplete: function(value) {
          that.term = value;
          that.setCity(value);
        }
      });
    });
  }
};
</script>
