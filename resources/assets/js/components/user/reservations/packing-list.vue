<template>
<div class="panel  printable">
  <div class="panel-heading">
    <button class="btn btn-sm btn-default pull-right" @click="print">
      <i class="fa fa-print"></i> Print
    </button>
    <h5><i class="fa fa-list"></i>&nbsp;Packing List</h5>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <packing-list-item v-for="item in reservation.escape.packing_list.items" :item="item" />
      </div>
    </div>
  </div>
</div>
</template>
<script>
import PackingListItem from './packing-list-item.vue';
export default {
  name: 'packing-list',
  components: {
    PackingListItem
  },
  props: {
    reservation: {
      type: Object,
      required: true
    }
  },
  methods: {
    print() {
      window.print();
    }
  }
};
</script>
<style scoped>
.btn {
  margin: 0;
}
.panel-heading {
  min-height: 50px;
}
</style>
