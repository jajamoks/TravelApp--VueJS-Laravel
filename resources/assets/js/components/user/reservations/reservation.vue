<template>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 profile-menu">
      <div class="panel">
        <div class="panel-heading ">
          <h5>{{reservation.escape.escape_type.name}}</h5>
          <div class="hidden-xs">{{reservation.escape.escape_type.location}}</div>
          <div class="hidden-xs">{{reservation.escape.short_display_date}}</div>
        </div>
        <div class="panel-body">
          <ul class="nav">
            <router-link :to="{ name: 'packing-list', params: {} }" tag="li" activeClass="active">
              <a href="#">
                <i class="fa fa-list"></i>
                <span class="hidden-xs">Packing List</span>
              </a>
            </router-link>
            <router-link :to="{ name: 'reading-list', params: {} }" tag="li" activeClass="active">
              <a href="#">
                <i class="fa fa-book"></i>
                <span class="hidden-xs">Reading List</span>
              </a>
            </router-link>
            <router-link :to="{ name: 'itinerary', params: {} }" tag="li" activeClass="active">
              <a href="#">
                <i class="fa fa-calendar-o"></i>
                <span class="hidden-xs">Itinerary</span>
              </a>
            </router-link>
            <router-link :to="{ name: 'contact-info', params: {} }" tag="li" activeClass="active">
              <a href="#">
                <i class="fa fa-phone"></i>
                <span class="hidden-xs">Contact &amp; Arrival Info</span>
              </a>
            </router-link>
            <router-link :to="{ name: 'flight-info', params: {} }" tag="li" activeClass="active">
              <a href="#">
                <div class="inline-menu-container">
                  <div class="pulse-container" v-if="showFlightPulse">
                      <div class="dot"></div>
                      <div class="pulse"></div>
                  </div>
                  <i class="fa fa-plane"></i>
                  <div class="hidden-xs inline-menu-label">
                    Flight Info
                  </div>
                </div>
              </a>
            </router-link>
            <router-link :to="{ name: 'payments', params: {} }" tag="li" activeClass="active">
              <a href="#">
                <div class="inline-menu-container">
                  <div class="pulse-container" v-if="showBalancePulse">
                      <div class="dot"></div>
                      <div class="pulse"></div>
                  </div>
                  <i class="fa fa-credit-card"></i>
                  <div class="hidden-xs inline-menu-label">
                    Payments
                  </div>
                </div>
              </a>
            </router-link>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <transition name="fade">
          <router-view :reservation="reservation" :loaded="loaded" v-on:reservation-changed="updateReservation" v-on:successful-payment="fetchData"></router-view>
      </transition>
    </div>
  </div>
</div>
</template>
<script>
export default {
  name: 'reservation',
  data: () => ({
    reservation: {
      current_balance: 1,
      escape: {
        escape_type: {
          name: ''
        },
        itinerary: {
          activities: []
        },
        packing_list: {
          items: []
        }
      }
    },
    loaded: false
  }),
  methods: {
    fetchData() {
      const { id } = this.$route.params;
      axios.get(`/api/user/reservations/${id}`).then(res => {
        this.loaded = true;
        this.reservation = res.data;
      });
    },
    updateReservation(reservation) {
      this.reservation = reservation;
    }
  },
  computed: {
    showFlightPulse() {
      return !this.reservation.flight;
    },
    showBalancePulse() {
      return this.reservation.current_balance !== 0;
    }
  },
  mounted() {
    this.fetchData();
  }
};
</script>
