<template>
<div class="space-top">
  <div class="form-group" :class="{
    'has-error': form.errors.has('profile.emergency_contact_name')
    }">
    <label>Emergency Contact Name</label>
    <input class="form-control" name="emergency_contact_name" type="text"  v-model="form.profile.emergency_contact_name" />
    <div class="alert alert-danger" v-if="form.errors.has('profile.emergency_contact_name')">
      Please list emergency contact name.
    </div>
  </div>
  <div class="form-group" :class="{
    'has-error': form.errors.has('profile.emergency_contact_relationship')
    }">
    <label>Emergency Contact Relationship</label>
    <input class="form-control" name="emergency_contact_relationship" type="text" v-model="form.profile.emergency_contact_relationship"/>
    <div class="alert alert-danger" v-if="form.errors.has('profile.emergency_contact_relationship')">
      Please list emergency contact relationship.
    </div>
  </div>
  <div class="form-group" :class="{
    'has-error': form.errors.has('profile.emergency_contact_phone')
    }">
    <label>Emergency Contact Phone Number (Please include area code)</label>
    <input class="form-control" name="emergency_phone_number" type="text" v-model="form.profile.emergency_contact_phone"/>
    <div class="alert alert-danger" v-if="form.errors.has('profile.emergency_contact_phone')">
      Please list emergency contact phone number.
    </div>
  </div>
</div>
</template>
<script>
export default {
  name: 'emergency-contact-question',
  props: {
    form: {
      type: Object,
      required: true
    }
  }
};
</script>
