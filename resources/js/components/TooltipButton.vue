<template>
  <a
    :href="path"
    class="tooltipped action waves-effect"
    :class="classes"
    :data-position="position"
    :data-tooltip="data"
    @click="clickedEvent"
  >
    <slot></slot>
  </a>
</template>
<style lang="scss" scoped>
.action.btn-small {
  padding: 0 12px;
  i {
    font-size: 1.5rem;
  }
}
</style>
<script>
export default {
  props: [
    "path",
    "color",
    "text_color",
    "text",
    "btn_style",
    "btn_size",
    "position",
    "data",
    "is_submit"
  ],
  computed: {
    classes: function() {
      return (
        this.color +
        " " +
        this.text_color +
        " " +
        this.btn_style +
        " " +
        this.btn_size +
        " "
      );
    }
  },
  methods: {
    clickedEvent: function() {
      if (this.is_submit) {
        this.$emit("send_form");
      }
    }
  },
  mounted() {
    var elems = document.querySelectorAll(".tooltipped");
    var instances = M.Tooltip.init(elems);
  }
};
</script>
