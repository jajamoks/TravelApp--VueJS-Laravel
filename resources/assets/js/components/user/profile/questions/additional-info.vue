<template>
<div class="form-group">
  <label>Anything else you would like to tell us before we meet you in person?</label>
  <textarea name="additional_info" class="form-control" v-model="form.profile.additional_info"></textarea>
  <div v-if="form.errors.has('profile.additional_info')" class="alert alert-danger">
  </div>
</div>
</template>
<script>
export default {
  name: 'additional-info-question',
  props: {
    form: {
      type: Object,
      required: true
    }
  }
};
</script>
