<template>
  <div class="space-top">
    <div class="row">
      <div class="col-md-12" v-if="hasDietRestrictions.length > 0">
        <div class="row space-bottom" v-for="res in hasDietRestrictions">
          <div class="col-md-12">
            <hr />
            <strong>{{userFullName(res.user)}}</strong>
            <strong v-if="res.additional_guest_name">&amp; {{res.additional_guest_name}}</strong>
            <div>
              <span class="health-label">Restrictions:</span> {{res.user.profile.diet_restrictions}}
            </div>
          </div>
          <hr />
        </div>
      </div>
      <div class="col-md-12" v-else>
        <div class="alert alert-info">
          No restrictions indicated
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'diet',
  props: {
    reservations: {
      type: Array,
      required: true
    }
  },
  computed: {
    hasDietRestrictions() {
      return this.reservations.filter(res => {
        return res.user.profile.diet_has_restrictions === 1;
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
