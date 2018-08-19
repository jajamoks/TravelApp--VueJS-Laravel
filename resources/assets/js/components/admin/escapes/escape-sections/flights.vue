<template>
<div class="space-top">
  <div class="row">
    <div class="col-md-6">
      <h4>Confirmed <span class="badge">{{confirmed.length}}</span></h4>
      <hr />
      <div class="row space-bottom" v-for="res in confirmed">
        <div class="col-md-12">
          <strong>{{userFullName(res.user)}}</strong>
          <strong v-if="res.additional_guest_name">&amp; {{res.additional_guest_name}}</strong>
        </div>
        <div class="col-md-6">
            <strong>Arrival</strong>
            <div>Airline: {{res.flight.arrival_airline}}</div>
            <div>Airport:  {{res.flight.arrival_airport}}</div>
            <div>Flight: {{res.flight.arrival_flight_number}}</div>
            <div>Date: {{formatDate(res.flight.arrival_date)}}</div>
        </div>
        <div class="col-md-6">
          <strong>Departure</strong>
          <div>Airline: {{res.flight.departure_airline}}</div>
          <div>Airport:  {{res.flight.departure_airport}}</div>
          <div>Flight: {{res.flight.departure_flight_number}}</div>
          <div>Date: {{formatDate(res.flight.departure_date)}}</div>
        </div>
        <hr />
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
import moment from 'moment';
export default {
  name: 'flights',
  props: {
    reservations: {
      type: Array,
      required: true
    }
  },
  computed: {
    confirmed() {
      return this.reservations.filter(res => {
        return res.flight;
      });
    },
    waitingOn() {
      return this.reservations.filter(res => {
        return !res.flight;
      });
    }
  },
  methods: {
    userFullName(user) {
      return `${user.first_name} ${user.last_name}`;
    },
    formatDate(date) {
      return moment(date).format('M/D/YYYY h:mma');
    }
  }
};
</script>
