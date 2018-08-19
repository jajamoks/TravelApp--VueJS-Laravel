<template>
  <div class="space-top">
    <div class="row">
      <div class="col-md-6">
        <h4>Confirmed <span class="badge">{{confirmed.length}}</span></h4>
        <hr />
        <div class="row space-bottom" v-for="res in confirmed">
          <div class="col-md-12">
            <button class="btn btn-default btn-sm pull-right" data-toggle="modal" :data-target="`#modal-${res.id}`">
              View
            </button>
            <div class="modal fade printable autoprint" tabindex="-1" role="dialog" :id="`modal-${res.id}`">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Waiver</h4>
                  </div>
                  <div class="modal-body">
                      <waiver :waiver="res.waiver" />
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="print">Print</button>
                  </div>
                </div>
              </div>
            </div>
            <strong>{{userFullName(res.user)}}</strong>
            <strong v-if="res.additional_guest_name">&amp; {{res.additional_guest_name}}</strong>
            <hr />
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <h4>Waiting On <span class="badge">{{waitingOn.length}}</span></h4>
        <hr />
        <div class="row space-bottom" v-for="res in waitingOn">
          <div class="col-md-12">
            <strong>{{userFullName(res.user)}}</strong>
            <strong v-if="res.additional_guest_name">&amp; {{res.additional_guest_name}}</strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Waiver from './waiver.vue';
export default {
  name: 'waivers',
  components: {
    Waiver
  },
  props: {
    reservations: {
      type: Array,
      required: true
    }
  },
  computed: {
    confirmed() {
      return this.reservations.filter(res => res.waiver);
    },
    waitingOn() {
      return this.reservations.filter(res => !res.waiver);
    }
  },
  methods: {
    userFullName(user) {
      return `${user.first_name} ${user.last_name}`;
    },
    formatDate(date) {
      return moment(date).format('M/D/YYYY h:mma');
    },
    print() {
      window.print();
    }
  }
};
</script>
<style scoped>
.modal-dialog {
  width: 90%;
}
</style>
