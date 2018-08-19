<template>
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-heading">
          Escapes
        </div>
        <div class="panel-body">
          <ul class="nav margin-bottom hidden-xs">
            <router-link tag="li" activeClass="active" :to="{name: 'upcoming-escapes'}">
              <a>Upcoming</a>
            </router-link>
            <router-link tag="li" activeClass="active" :to="{name: 'past-escapes'}">
              <a>Past</a>
            </router-link>
            <router-link tag="li" activeClass="active" :to="{name: 'escape-builder'}">
              <a>Builder</a>
            </router-link>
          </ul>
          <select class="form-control hidden-sm hidden-md hidden-lg space-bottom" v-model="route">
            <option value="upcoming-escapes">Upcoming</option>
            <option value="past-escapes">Past</option>
            <option value="escape-builder">Builder</option>
          </select>
          <div class="text-center">
            <router-link tag="button" :to="{name: 'escape-new', params:{id: 'new'}}" class="btn btn-primary">
              Schedule
            </router-link>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <transition name="fade">
        <router-view></router-view>
      </transition>
    </div>
  </div>
</template>
<script>
export default {
  name: 'escapes',
  computed: {
    route: {
      get: function() {
        return this.$route.name;
      },
      set: function(val) {
        this.$router.push({ name: val });
      }
    }
  }
};
</script>
