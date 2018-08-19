<template>
<div>
<div class="container-fluid" v-if="!this.loading">
  <div class="sub-header">
      <h5>My Escapes</h5>
  </div>
  <div v-if="reservations.length > 0 && !this.loading">
    <reservation-list-item
      v-for="reservation in reservations"
      :key="reservation.id"
      :reservation="reservation"
    />
  </div>
  <div v-else-if="!this.loading">
    <div class="panel empty-escape-item">
      <div class="row">
        <div class="col-md-6">
          <div class="empty-calendar">
            <i class="fa fa-calendar-o" aria-hidden="true"></i>
          </div>
            <h4>No Current Reservations</h4>
        </div>
        <div class="col-md-6">
          <a href="/escapes" class="btn btn btn-info btn-info-filled book-escape-button">
            Book Escape
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<hr />
</div>
</template>
<script>
import axios from 'axios';
import ReservationListItem from './reservation-list-item.vue';
import Stepper from './stepper';
import moment from 'moment';
export default {
	name: 'escapes',
	components: {
		ReservationListItem,
		Stepper,
	},
	data: () => ({
		reservations: [],
		loading: false,
	}),
	methods: {
		fetchData() {
			this.loading = true;
			axios.get('/api/user/reservations').then(res => {
				res.data.forEach(reservation => {
					if (!reservation.waiver || !reservation.waiver.is_signed) {
						this.$router.push({
							name: 'waiver',
							params: { id: reservation.id },
						});
					}
				});
				this.loading = false;
				this.reservations = res.data;
			});
		},
	},
	computed: {
		upcomingEscapes() {
			return this.reservations.filter(res => moment(res.escape.end_date).unix() > moment().unix());
		},
		userActionsNeeded() {
			return this.upcomingEscapes.length > 0;
		},
	},
	mounted() {
		this.fetchData();
	},
};
</script>
