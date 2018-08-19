<template>
  <div class="packing-list-item">
    <hr />
    <div class="packing-list-item-header">
      {{item.name}}
    </div>
    <p>
      {{item.description}}
    </p>
    <div class="packing-list-item-purchase" v-if="item.link">
      <a target="_blank" :href="item.link" class="btn btn-info btn-info-filled">
        Purchase
      </a>
    </div>
  </div>
</template>
<script>
export default {
  name: 'packing-list-item',
  props: {
    item: {
      type: Object,
      required: true
    }
  }
};
</script>
<style scoped>
  .packing-list-item-header {
    font-weight: bold;
  }

</style>
