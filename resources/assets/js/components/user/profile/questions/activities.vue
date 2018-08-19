<template>
<div class="space-top">
<div class="form-group">
  <label>Please let us know if you currently engage in any physical activities. For example - Pilates, barre classes, hiking, biking, Zumba, swimming, tennis, etc?</label>
  <div>
    <label class="radio-inline">
     <input type="radio" name="engages_in_activities" id="engages_in_activities_yes" value="1" v-model="form.profile.health_is_active"> Yes
    </label>
    <label class="radio-inline">
     <input type="radio" name="engages_in_activities" id="engages_in_activities_no" value="0" v-model="form.profile.health_is_active"> No
    </label>
  </div>
</div>
<div class="form-group" v-if="isPositive">
  <label>Please let us know which activities are part of your weekly routine</label>
  <textarea class="form-control" name="activities" v-model="form.profile.health_activities"></textarea>
  <div class="alert alert-danger" v-if="form.errors.has('profile.health_activities')">
    Please list some activities
  </div>
</div>
</div>
</template>
<script>
export default {
  name: 'activities-question',
  props: {
    form: {
      type: Object,
      required: true
    }
  },
  computed: {
    isPositive() {
      return this.form.profile.health_is_active == 1;
    }
  }
};
</script>
