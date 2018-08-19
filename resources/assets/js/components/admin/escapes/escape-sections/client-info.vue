<template>
<div>
<div class="row space-top">
  <div class="col-md-12" v-if="loaded && reservations.length">
    <div class="space-bottom space-top">
        <h4>Missing Information</h4>
    </div>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th class="text-right">Send Reminder</th>
        </thead>
        <tbody>
          <tr v-for="reservation in reservations" :key="reservation.id" v-if="!reservation.has_required_info">
            <td>{{userFullName(reservation.user)}}</td>
            <td>{{reservation.user.email}}</td>
            <td>
              <button class="btn btn-sm btn-default pull-right" @click="sendReminder(reservation)">
                <i class="fa fa-envelope"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-12" v-else-if="loaded && reservations.length === 0">
    <div class="alert alert-info">
      No Reservations ... Yet!
    </div>
  </div>
</div>
<div class="row space-top">
  <div class="col-md-12" v-if="loaded && reservations.length">
    <div class="space-bottom space-top">
        <h4>Emergency Contact Info</h4>
    </div>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <th>Client Name</th>
          <th>Contact Name</th>
          <th>Relationship</th>
          <th>Phone</th>
        </thead>
        <tbody>
          <tr v-for="reservation in reservations" :key="reservation.id" v-if="reservation.user.profile.emergency_contact_name">
            <td>{{userFullName(reservation.user)}}</td>
            <td>{{reservation.user.profile.emergency_contact_name}}</td>
            <td>
              {{reservation.user.profile.emergency_contact_relationship}}
            </td>
            <td>{{reservation.user.profile.emergency_contact_phone}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-12" v-else-if="loaded && reservations.length === 0">
    <div class="alert alert-info">
      No Reservations ... Yet!
    </div>
  </div>
</div>
</div>
</template>
<script>
import axios from 'axios';
export default {
  name: 'escape-client-info',
  props: {
    reservations: {
      type: Array,
      required: true
    },
    loaded: {
      type: Boolean,
      required: true
    }
  },
  methods: {
    userFullName(user) {
      return `${user.first_name} ${user.last_name}`;
    },
    sendReminder(reservation) {
      axios
        .post(
          `/api/escapes/${reservation.escape_id}/reservations/${
            reservation.id
          }/missing-info-reminder`
        )
        .then(res => {
          alert('Reminder Sent');
        });
    }
  }
};
</script>
