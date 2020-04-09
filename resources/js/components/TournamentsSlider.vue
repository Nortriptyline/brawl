<template>
  <div class="row tournaments_row">
    <header class="col s12">
      <span class="title left">{{ title }}</span>
      <div class="navigation right">
        <button
          class="btn-flat"
          :class="'swiper-prev-' + this.name"
          slot="button-prev"
        >
          <i class="material-icons">chevron_left</i>
        </button>
        <button
          class="btn-flat"
          :class="'swiper-next-' + this.name"
          slot="button-next"
        >
          <i class="material-icons">chevron_right</i>
        </button>
      </div>
    </header>

    <swiper class="col s12" ref="mySwiper" :options="swiperOptions">
      <swiper-slide
        v-for="tournament in tournaments"
        :key="tournament.id"
        class="card small"
      >
        <a href="#">
          <div class="card-image">
            <img src="https://picsum.photos/1280/720" />
          </div>
          <div class="card-content">
            <p class="truncate card-title">
              {{ tournament.name }}
            </p>
            <div class="infos">
              <p class="city">
                {{ tournament.city.name }}
              </p>
              <p class="date">
                {{ tournament.starting_date }}
              </p>
            </div>
          </div>
        </a>
      </swiper-slide>
    </swiper>
  </div>
</template>

<style lang="scss" scoped>
header {
  .title {
    font-size: 1.2rem;
    font-weight: 500;
  }
}
.card {
  .card-content {
    padding: 15px;

    .card-title {
      margin-bottom: 0;
    }

    p {
      color: black;
      text-decoration: none;
      &.card-title {
        font-size: 1.1rem;
      }
    }
    .infos {
      p {
        font-size: 0.9rem;
        font-weight: 300;
      }
    }
  }
}
</style>

<script>
import tournamentApi from "../services/api/Tournament";

export default {
  data: function() {
    return {
      tournaments: [],
      swiperOptions: {
        slidesPerView: 4,
        spaceBetween: 30,
        navigation: {
          nextEl: ".swiper-next-" + this.name,
          prevEl: ".swiper-prev-" + this.name,
          disabledClass: "disabled"
        }
      }
    };
  },
  props: ["title", "path", "name", "term"],
  methods: {
    getTournaments: function(path) {
      //   if (
      //     this.name !== "search" ||
      //     (this.name === "search" && this.term.length > 0)
      //   ) {
      //       }
      return tournamentApi.getByUrl(path);
    }
  },
  computed: {
    swiper() {
      return this.$refs.mySwiper.$swiper;
    }
  },
  watch: {
    term: function() {
        console.log("here");
      var fullPath = this.path + this.term;
      this.getTournaments(fullPath).then(data => {
        this.tournaments = data;
      });
    }
  },
  mounted() {
    if (this.name !== "search") {
      this.getTournaments(this.path).then(data => {
        this.tournaments = data;
      });
    }
  }
};
</script>
