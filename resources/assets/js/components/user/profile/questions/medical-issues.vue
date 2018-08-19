<template>
<div class="space-top">
  <div class="form-group">
    <label>Do you have any injuries or medical conditions we should be aware of?</label>
    <div>
      <label class="radio-inline">
       <input type="radio" name="medical_issues" id="medical_issues_yes" value="1" v-model="form.profile.health_has_injuries"> Yes
      </label>
      <label class="radio-inline">
       <input type="radio" name="medical_issues" id="medical_issues_no" value="0" v-model="form.profile.health_has_injuries"> No
      </label>
    </div>
  </div>
  <div class="form-group" v-if="isPositive">
    <label>Please list them below</label>
    <textarea class="form-control" name="activities" v-model="form.profile.health_injuries"></textarea>
    <div class="alert alert-danger" v-if="form.errors.has('profile.health_injuries')">
      Please list any injuries
    </div>
  </div>
</div>
</template>
<script>
export default {
  name: 'medical-issues-question',
  props: {
    form: {
      type: Object,
      required: true
    }
  },
  computed: {
    isPositive() {
      return this.form.profile.health_has_injuries == 1;
    }
  }
};
</script>
