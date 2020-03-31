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

    <input id="city_id" v-model="city_id" type="hidden" name="city_id" />
  </div>
</template>

<script>
import cityApi from "../services/api/City";

export default {
  data: function() {
    return {
      cities: [],
      citiesId: [],
      city_id: "",
      term: "",
      searchable: true,
      instance: ""
    };
  },
  props: ["city"],
  methods: {
    // Call for api search of cities
    search: function(term) {
      if (this.searchable === true) {
        //   Search only if there is more than 0 characters
        if (term.length > 0) {
          cityApi.search(term).then(data => {
            if (!this.citiesId.hasOwnProperty(term)) {
              // Set cities. Allow displayed_cities to be formatted
              this.cities = data;

              // Set displayed cities in autocomplete datas
              this.instance.updateData(this.displayedCities);
              this.instance.open();
            }
          });
        }
      } else {
        // Allow materializecss label to consider it as selected
        $("#city_name").focus();
        // If not delayed, label does not consider element as selected.
        _.delay(function() {
          $(":focus").blur();
        }, 0);

        // Re-enable search after initial lock
        this.searchable = true;
      }
    },
    setCity: function(city) {
      this.city_id =
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

    if (this.city !== undefined) {
      var city = JSON.parse(this.city);

      // if city is already exist, lock initial search.
      this.searchable = false;

      // Set Existing value into input
      city = JSON.parse(this.city);
      this.city_id = city.id;
      this.term = city.name + " " + city.zip_code;
    }

    var options = {
      data: {},
      onAutocomplete: function(value) {
        that.term = value;
        that.setCity(value);
      }
    };
    var elems = document.querySelectorAll(".autocomplete");
    var instances = M.Autocomplete.init(elems, options);
    this.instance = M.Autocomplete.getInstance($("input.autocomplete"));
  }
};
</script>
