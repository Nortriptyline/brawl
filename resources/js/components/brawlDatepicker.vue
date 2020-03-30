<template>
  <div class="input-field col s6">
    <input
      type="text"
      name="display_date"
      class="datepicker"
      id="display_date"
    />
    <label for="starting_date">Date</label>
    <input
      type="hidden"
      name="starting_date"
      id="starting_date"
      v-model="starting_date"
    />
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      starting_date: ""
    };
  },
  methods: {
    formatDate: function(date) {
      var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

      if (month.length < 2) month = "0" + month;
      if (day.length < 2) day = "0" + day;

      return [year, month, day].join("-");
    },
    setDate: function(starting_date) {
      this.starting_date = this.formatDate(starting_date);
    }
  },
  mounted: function() {
    var that = this;
    $(".datepicker").datepicker({
      autoClose: true,
      format: "dddd dd mmmm yyyy",
      firstDay: 1,
      i18n: {
        done: "Valider",
        clear: "Effacer",
        cancel: "Annuler",
        months: [
          "Janvier",
          "Février",
          "Mars",
          "Avril",
          "Mai",
          "Juin",
          "Juillet",
          "Août",
          "Septembre",
          "Octobre",
          "Novembre",
          "Décembre"
        ],
        monthsShort: [
          "Jan",
          "Fev",
          "Mar",
          "Avr",
          "Mai",
          "Jun",
          "Jul",
          "Aou",
          "Sep",
          "Oct",
          "Nov",
          "Dec"
        ],
        weekdays: [
          "Dimanche",
          "Lundi",
          "Mardi",
          "Mercredi",
          "Jeudi",
          "Vendredi",
          "Samedi"
        ],
        weekdaysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
        weekdaysAbbrev: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"]
      },
      onSelect: function(data) {
        that.setDate(data);
      }
    });
  }
};
</script>
