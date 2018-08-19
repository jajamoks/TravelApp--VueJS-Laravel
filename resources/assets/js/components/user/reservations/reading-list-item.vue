<template>
  <div class="reading-list-item">
    <hr />
    <div class="reading-list-item-header">
      {{item.name}}
    </div>
    <p>
      {{item.description}}
    </p>
    <div class="reading-list-item-purchase" v-if="item.link">
      <a target="_blank" :href="item.link" class="btn btn-info btn-info-filled">
        View
      </a>
    </div>
  </div>
</template>
<script>
export default {
  name: 'reading-list-item',
  props: {
    item: {
      type: Object,
      required: true
    }
  }
};
</script>
<style scoped>
  .reading-list-item-header {
    font-weight: bold;
  }

</style>
