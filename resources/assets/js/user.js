/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./user-bootstrap');
require('./forms/bootstrap');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import {
  MyEscapes,
  Reservation,
  Payment,
  Layout,
  FlightInfo,
  PackingList,
  ReadingList,
  Itinerary,
  ContactInfo,
} from './components/user/bootstrap';

import {
  BillingInfo,
  Account,
  Diet,
  Profile,
  Requests,
  HealthInfo,
  EmergencyContact,
  AdditionalInfo,
} from './components/user/profile/bootstrap';

import Waiver from './components/user/waiver/form.vue';

const routes = [
  {
    path: '/',
    component: Layout,
    children: [
      { path: '', component: MyEscapes, name: 'my-escapes' },
      {
        path: 'profile',
        component: Profile,
        children: [
          { path: 'billing', component: BillingInfo, name: 'billing-info' },
          { path: 'account', component: Account, name: 'account-info' },
          { path: 'diet', component: Diet, name: 'diet-info' },
          { path: 'health', component: HealthInfo, name: 'health-info' },
          {
            path: 'emergency',
            component: EmergencyContact,
            name: 'emergency-contact',
          },
          {
            path: 'additional-info',
            component: AdditionalInfo,
            name: 'additional-info',
          },
        ],
      },
      {
        path: '/reservations/:id',
        component: Reservation,
        children: [
          { path: 'payments', component: Payment, name: 'payments' },
          {
            path: 'packing-list',
            component: PackingList,
            name: 'packing-list',
          },
          {
            path: 'reading-list',
            component: ReadingList,
            name: 'reading-list',
          },
          { path: 'itinerary', component: Itinerary, name: 'itinerary' },
          { path: 'flight-info', component: FlightInfo, name: 'flight-info' },
          {
            path: 'waiver',
            component: Waiver,
            name: 'waiver',
          },
          {
            path: 'contact',
            component: ContactInfo,
            name: 'contact-info',
          },
        ],
      },
    ],
  },
];

const router = new VueRouter({ routes });

import User from './components/user/user.vue';
import { UserEvents } from './components/user/user-events';
import axios from 'axios';
const app = new Vue({
  components: {
    User,
  },
  data: () => ({
    user: {},
  }),
  methods: {
    fetch() {
      axios.get('/api/user').then(res => {
        if (res.data.profile.complete) {
          UserEvents.$emit('profile-complete');
        } else {
          UserEvents.$emit('profile-incomplete');
        }
      });
    },
  },
  mounted() {
    this.fetch();
  },
  router,
}).$mount('#user');
