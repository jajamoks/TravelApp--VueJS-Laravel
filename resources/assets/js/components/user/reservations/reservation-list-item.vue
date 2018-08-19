<template>
<div class="my-escapes-item space-bottom panel">
  <div class="panel-heading">
    <i class="fa fa-exclamation-circle pull-right icon-lg icon-danger" v-if="!userCompletedActions"></i>
    <i class="fa fa-check-circle-o pull-right icon-lg icon-success" v-if="userCompletedActions"></i>
    <h4>{{reservation.escape.escape_type.name}}</h4>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
        <img class="img-responsive" :src="reservation.escape.escape_type.featured_image.fullSize" />
      </div>
      <div class="col-md-10">
        <h5>{{reservation.escape.escape_type.location}}</h5>
        <p>{{reservation.escape.display_date}}</p>
        <div>Flight Info
          <i class="fa fa-check-square-o" v-if="reservation.flight"></i>
          <i class="fa fa-square-o" v-else></i>
        </div>
        <div>Balance
          <i class="fa fa-check-square-o" v-if="reservation.current_balance === 0"></i>
          <i class="fa fa-square-o" v-else></i>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <router-link class="btn btn-info btn-info-filled pull-right" :to="{ name: 'packing-list', params: {id: reservation.id} }">View</router-link>
      </div>
    </div>
  </div>
</div>
</template>
<script>
export default {
  name: 'reservation-list-item',
  props: {
    reservation: {
      type: Object,
      required: true
    }
  },
  computed: {
    userCompletedActions() {
      return this.reservation.flight && this.reservation.current_balance === 0;
    }
  }
};
</script>
