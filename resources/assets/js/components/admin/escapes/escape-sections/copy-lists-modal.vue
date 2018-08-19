<template>
<span>
<button
  type="button"
  class="btn btn-info btn-sm"
  data-target="#copyListsModal"
  @click="showModal">
  <i class="fa fa-copy"></i>
</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" ref="copyListsModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Copy Existing Itinerary, Packing List, and Reading List</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Escape to Copy</label>
          <select class="form-control" v-model="selected">
            <option v-for="item in escapes" :key="item.value" :value="item.value">{{item.label}}</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" ref="close">Cancel</button>
        <button type="button" class="btn btn-primary" @click="copy">Copy</button>
      </div>
    </div>
  </div>
</div>
</span>
</template>

<script>
import axios from 'axios';
export default {
  name: 'copy-lists-modal',
  data: () => ({
    selected: null,
    escapes: []
  }),
  props: {
    escape: {
      type: Object,
      required: true
    }
  },
  methods: {
    showModal(e) {
      $(this.$refs.copyListsModal)
        .appendTo('body')
        .modal('show');
    },
    fetchEscapes() {
      axios
        .get(`/api/escapes-as-options`)
        .then(res => (this.escapes = res.data));
    },
    copy() {
      if (this.selected != null) {
        axios
          .post(`/api/escapes/${this.escape.id}/copy-lists/${this.selected}`)
          .then(res => {
            window.location.reload();
          });
      }
    }
  },
  mounted() {
    this.fetchEscapes();
  }
};
</script>

