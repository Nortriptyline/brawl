<template>
    <div></div>
</template>
<script>
export default {
  data: function() {
    return {};
  },
  props: ["message"],
  mounted() {
    var message = this.message;
    M.toast({ html: message });
  }
};
</script>
