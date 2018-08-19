<template>
  <div class="form-group">
    <label>What is it you would like to come away with from this holiday? For example - weight loss, tone up, cultural discoveries, relaxation, etc.</label>
    <textarea name="goals" class="form-control" v-model="form.profile.goals"></textarea>
    <div class="alert alert-danger" v-if="form.errors.has('profile.goals')">
      Please list your goals for this holiday
    </div>
  </div>
</template>
<script>
export default {
  name: 'goals-question',
  props: {
    form: {
      type: Object,
      required: true
    }
  }
};
</script>
