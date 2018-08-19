<template>
<div class="panel">
  <div class="panel-heading">
    <h5><i class="fa fa-list"></i>&nbsp;Reading List</h5>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <reading-list-item v-for="item in reservation.escape.reading_list.items" :item="item" />
      </div>
    </div>
  </div>
</div>
</template>
<script>
import ReadingListItem from './reading-list-item.vue';
export default {
  name: 'reading-list',
  components: {
    ReadingListItem
  },
  props: {
    reservation: {
      type: Object,
      required: true
    }
  }
};
</script>
