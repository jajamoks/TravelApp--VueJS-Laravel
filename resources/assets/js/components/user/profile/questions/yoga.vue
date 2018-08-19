<template>
  <div class="form-group">
    <label>
      Please let us know your yoga level. It is OK to say you have never practiced yoga before- your answer just gives us an idea of the overall group level so we can best address everyone's needs.
    </label>
    <select class="form-control" v-model="form.profile.yoga_level">
      <option value="" disabled>Please Choose...</option>
      <option value="Have taken 0-10 classes">
        Have taken 0-10 classes
      </option>
      <option value="Have taken 10-30 classes">
        Have taken 10-30 classes
      </option>
      <option value="Have taken more than 50 classes">
        Have taken more than 50 classes
      </option>
      <option value="Practice regularly">
        Practice regularly
      </option>
      <option value="Practice regularly">
        I am a yoga teacher
      </option>
      <option value="I am not interested in yoga">
        I am not interested in yoga
      </option>
    </select>
    <div class="alert alert-danger" v-if="form.errors.has('profile.yoga_level')">
      Please choose yoga level
    </div>
  </div>
</template>
<script>
export default {
  name: 'yoga-question',
  props: {
    form: {
      type: Object,
      required: true
    }
  }
};
</script>
