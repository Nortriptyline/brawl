<template>
  <div class="modal-content">
    <div class="row">
      <div class="input-field col offset-s4 s4">
        <input type="text" v-model="term" id="searchInput" placeholder="Nom / Ville / Département / Genre / Terrain" />
      </div>
    </div>
    <div class="row">
      <tournaments-slider
        title="Résultat de la recherche"
        path="search/"
        name="search"
        :term="term"
      >
      </tournaments-slider>
    </div>
  </div>
</template>
<script>
export default {
    data: function() {
        return {
            term: '',
        }
    },
};
</script>
