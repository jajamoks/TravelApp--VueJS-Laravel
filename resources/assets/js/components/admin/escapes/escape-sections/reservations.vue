<template>
<div>
  <div class="btn-group space-top" role="group" aria-label="...">
    <button type="button" class="btn btn-sm btn-default" :class="{
      'active' : active === 'rooms'
    }" @click="active = 'rooms'">
      Rooms
    </button>
    <button type="button" class="btn btn-sm btn-default" :class="{
      'active' : active === 'flights'
    }" @click="active = 'flights'">
      Flights
    </button>
    <button type="button" class="btn btn-sm btn-default" :class="{
      'active' : active === 'health'
    }" @click="active = 'health'">
      Health
    </button>
    <button type="button" class="btn btn-sm btn-default" :class="{
      'active' : active === 'diet'
    }" @click="active = 'diet'">
      Diet
    </button>
    <button type="button" class="btn btn-sm btn-default" :class="{
      'active' : active === 'waivers'
    }" @click="active = 'waivers'">
      Waivers
    </button>
     <button type="button" class="btn btn-sm btn-default" :class="{
      'active' : active === 'client-info'
    }" @click="active = 'client-info'">
      Client Info
    </button>
  </div>
  <div class="space-top">
    <transition name="fade">
    <escape-reservations
      v-if="active === 'rooms'"
      :private="private"
      :shared="shared"
      :loaded="loaded"
      :reservations="reservations"
      :form="form"
      />
      <flights v-if="active === 'flights'"
        :reservations="reservations"
      />
      <health v-if="active === 'health'"
        :reservations="reservations"
      />
      <diet v-if="active === 'diet'"
        :reservations="reservations"
      />
      <waivers v-if="active === 'waivers'"
        :reservations="reservations"
      />
      <client-info v-if="active === 'client-info'"
        :reservations="reservations"
        :loaded="loaded" />
    </transition>
  </div>
</div>
</template>

<script>
import EscapeReservations from './escape-reservations.vue';
import Health from './health.vue';
import Flights from './flights.vue';
import Diet from './diet.vue';
import Waivers from './waivers.vue';
import ClientInfo from './client-info.vue';
export default {
	name: 'reservations',
	components: {
		EscapeReservations,
		Flights,
		Health,
		Diet,
		Waivers,
		ClientInfo,
	},
	props: {
		form: {
			type: Object,
			required: true,
		},
	},
	data: () => ({
		reservations: [],
		private: [],
		shared: [],
		loaded: false,
		active: 'rooms',
	}),
	methods: {
		fetchData() {
			const { id } = this.$route.params;
			axios
				.get(`/api/escapes/${id}/reservations`)
				.then(res => {
					this.loaded = true;
					this.reservations = res.data;
					this.private = res.data.filter(res => res.room_type === 'private');
					this.shared = res.data.filter(res => res.room_type === 'shared');
				})
				.catch(err => console.log(err));
		},
	},
	mounted() {
		this.fetchData();
	},
};
</script>
