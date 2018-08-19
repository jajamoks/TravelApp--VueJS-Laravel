<template>
  <div class="space-top">
    <div class="row">
      <div class="col-md-12" v-if="complete.length > 0">
        <div class="row space-bottom" v-for="res in complete">
          <div class="col-md-12">
            <hr />
            <strong>{{userFullName(res.user)}}</strong>
            <strong v-if="res.additional_guest_name">&amp; {{res.additional_guest_name}}</strong>
            <div>
              <span class="health-label">Yoga Level:</span> {{res.user.profile.yoga_level}}
            </div>
            <div>
              <span class="health-label">Is Active:</span> {{isActive(res.user.profile.health_is_active) }}
            </div>
            <div v-if="res.user.profile.health_activities">
                <span class="health-label">Activites:</span> {{res.user.profile.health_activities }}
            </div>
            <div>
                <span class="health-label">Has Injuries:</span> {{isActive(res.user.profile.health_has_injuries) }}
            </div>
            <div v-if="res.user.profile.health_injuries">
              <span class="health-label">Injuries:</span> {{res.user.profile.health_injuries}}
            </div>
            <div v-if="res.user.profile.goals">
              <span class="health-label">Goal for Escape:</span> {{res.user.profile.goals}}
            </div>
            <div v-if="res.user.profile.additional_info">
              <span class="health-label">Additional Info:</span> {{res.user.profile.additional_info}}
            </div>
          </div>
          <hr />
        </div>
      </div>
      <div class="col-md-12" v-else>
        <div class="alert alert-info">
          No completed profiles yet.
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'health',
  props: {
    reservations: {
      type: Array,
      required: true
    }
  },
  computed: {
    complete() {
      return this.reservations.filter(res => {
        return res.user.profile.complete;
      });
    }
  },
  methods: {
    userFullName(user) {
      return `${user.first_name} ${user.last_name}`;
    },
    isActive(active) {
      return active === 1 ? 'Yes' : 'No';
    }
  }
};
</script>
<style scoped>
.health-label {
  font-weight: bold;
  color: #333;
}
</style>
