<template>
<div class="row space-top">
  <div class="col-md-12" v-if="loaded && reservations.length">
    <div class="space-bottom space-top">
        <h4>Shared Beds <span class="badge">{{form.available_shared_rooms}} remaining</span></h4>
    </div>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Guests</th>
          <th>Gender</th>
          <th>Roomate Requested</th>
          <th>Balance</th>
        </thead>
        <tbody>
          <tr v-for="reservation in shared" :key="reservation.id">
            <td>{{userFullName(reservation.user)}}</td>
            <td>{{reservation.user.email}}</td>
            <td>{{reservation.guests}}</td>
            <td>{{reservation.gender || 'NA'}}</td>
            <td>{{reservation.roomate_name}}</td>
            <td>
              <edit-balance :reservation="reservation" />
              <button class="btn btn-sm btn-default pull-right" @click="sendReminder(reservation)">
                <i class="fa fa-envelope"></i>
              </button>
              {{calculateBalance(reservation)}}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-md-12" v-if="loaded && reservations.length">
    <div class="space-bottom space-top">
      <h4>Private Beds <span class="badge">{{form.available_single_rooms}} remaining</span></h4>
    </div>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Guests</th>
          <th>Other Guest Name</th>
          <th>Balance</th>
        </thead>
        <tbody>
          <tr v-for="reservation in private"   :key="reservation.id">
            <td>{{userFullName(reservation.user)}}</td>
            <td>{{reservation.user.email}}</td>
            <td>{{reservation.guests}}</td>
            <td>{{reservation.additional_guest_name || "NA"}}</td>
            <td>
              <button class="btn btn-sm btn-default pull-right" @click="sendReminder(reservation)">
                <i class="fa fa-envelope"></i>
              </button>
              <edit-balance :reservation="reservation" />
              {{calculateBalance(reservation)}}
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
</template>
<script>
import axios from 'axios';
import EditBalance from './edit-balance.vue';
export default {
	name: 'escape-reservations',
	components: {
		EditBalance,
	},
	props: {
		private: {
			type: Array,
			required: true,
		},
		shared: {
			type: Array,
			required: true,
		},
		loaded: {
			type: Boolean,
			required: true,
		},
		form: {
			type: Object,
			required: true,
		},
		reservations: {
			type: Array,
			required: true,
		},
	},
	methods: {
		userFullName(user) {
			return `${user.first_name} ${user.last_name}`;
		},
		calculateBalance(reservation) {
			const paid = reservation.payments.reduce((acc, curr) => {
				return acc + curr.amount;
			}, 0);
			return `\$${(reservation.total_balance - paid) / 100}`;
		},
		sendReminder(reservation) {
			axios
				.post(`/api/escapes/${reservation.escape_id}/reservations/${reservation.id}/balance-reminder`)
				.then(res => {
					alert('Reminder Sent');
				});
		},
	},
};
</script>
