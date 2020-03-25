<template>
  <div>
    <select class="select2" id="city" v-model="term" name="city"> </select>
  </div>
</template>

<script>
import cityApi from "../services/api/City";

export default {
  data: function() {
    return {
      cities: [],
      term: ""
    };
  },
  methods: {
  },
  computed: {},
  mounted() {
    $(".select2").select2({
      ajax: {
        url: "/api/city/search/" + this.term,
        processResults: function(data) {
          console.log(data);
        },
        delay: 250
      },
      minimumInputLength: 3
    });
  }
};
</script>
