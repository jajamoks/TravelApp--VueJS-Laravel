<template>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 profile-menu">
      <div class="panel">
        <div class="panel-heading">
          <h5>My Profile</h5>
        </div>
        <div class="panel-body">
          <ul class="nav">
            <router-link :to="{ name: 'account-info', params: {} }" tag="li" activeClass="active">
              <a href="#">
                <i class="fa fa-user"></i> <span class="hidden-xs">Account</span>
              </a>
            </router-link>
            <router-link :to="{ name: 'diet-info', params: {} }" tag="li" activeClass="active">
              <a href="#">
                <div class="inline-menu-container">
                  <div class="pulse-container" v-if="showDietPulse">
                      <div class="dot"></div>
                      <div class="pulse"></div>
                  </div>
                  <i class="fa fa-cutlery"></i>
                  <div class="hidden-xs inline-menu-label">
                    Diet
                  </div>
                </div>
              </a>
            </router-link>
            <router-link :to="{ name: 'health-info', params: {} }" tag="li" activeClass="active">
              <a href="#">
                <div class="inline-menu-container">
                  <div class="pulse-container" v-if="showHealthPulse">
                      <div class="dot"></div>
                      <div class="pulse"></div>
                  </div>
                  <i class="fa fa-heartbeat" aria-hidden="true"></i>
                  <div class="hidden-xs inline-menu-label">Health</div>
                </div>
              </a>
            </router-link>
            <router-link :to="{ name: 'emergency-contact', params: {} }" tag="li" activeClass="active">
              <a href="#">
                <div class="inline-menu-container">
                  <div class="pulse-container" v-if="showContactPulse">
                      <div class="dot"></div>
                      <div class="pulse"></div>
                  </div>
                  <i class="fa fa-id-card-o" aria-hidden="true"></i>
                  <div class="hidden-xs inline-menu-label">Contact</div>
                </div>
              </a>
            </router-link>
            <router-link :to="{ name: 'billing-info', params: {} }" tag="li" activeClass="active">
              <a href="#">
                <i class="fa fa-credit-card" aria-hidden="true"></i> <span class="hidden-xs">Billing</span>
              </a>
            </router-link>
               <router-link :to="{ name: 'additional-info', params: {} }" tag="li" activeClass="active">
              <a href="#">
                  <div class="inline-menu-container">
                  <div class="pulse-container" v-if="showAdditionalInfoPulse">
                      <div class="dot"></div>
                      <div class="pulse"></div>
                  </div>
                <i class="fa fa-info-circle" aria-hidden="true"></i> <span class="hidden-xs">Additional Info</span>
                </div>
              </a>
            </router-link>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <transition name="fade">
        <router-view :form="user" v-on:profile-change="profileChange"></router-view>
      </transition>
    </div>
  </div>
</div>
</template>
<script>
import axios from 'axios';
import { UserEvents } from '../user-events';
export default {
	name: 'profile',
	data: () => ({
		user: new Form({
			profile: {},
		}),
	}),
	methods: {
		getUser() {
			axios
				.get('/api/user')
				.then(response => {
					this.user = new Form(response.data);
				})
				.catch(err => {
					window.location.replace('/login');
				});
		},
		profileChange(user) {
			if (user.profile.complete) {
				UserEvents.$emit('profile-complete');
			}
			this.user = new Form(user);
		},
	},
	computed: {
		showHealthPulse() {
			return this.user.profile.health_has_injuries === null || this.user.profile.health_is_active === null;
		},
		showDietPulse() {
			return this.user.profile.diet_has_restrictions === null;
		},
		showContactPulse() {
			return this.user.profile.emergency_contact_name === null;
		},
		showAdditionalInfoPulse() {
			return this.user.profile.birthday === null;
		},
	},
	mounted() {
		this.getUser();
	},
};
</script>
