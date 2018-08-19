<template>
  <div class="panel">
    <div class="panel-heading">
      <h5><i class="fa fa-phone"></i>&nbsp;Contact &amp; Arrival Info</h5>
    </div>
    <div class="panel-body">
      <h6>On Arrival</h6>
      <p>Once at the airport, please look for the sign that says ESCAPE TO SHAPE after you exit the customs and immigration terminal. If other guests are arriving around the same time as you, they will share the ride with you. Ground transportation is included in your stay with us, so there is no need to pay the driver, although if you would like to tip them, they do appreciate even the slightest amount!</p>
      <div class="space-top space-bottom" v-if="reservation.escape.contact_info">
      <h6>Here is the address of your home-away-from home for immigration
     purposes</h6>
        <p v-html="reservation.escape.contact_info"></p>
      </div>
      <h6>Contact</h6>
      <p>We can be reached directly at 415-299-7038, which is our United States number that also works while traveling. Additionally, we can be reached at info@escapetoshape.com. Please pass this contact information along to anyone who may need to reach you while you are away, as some cellular phone companies do not have coverage in the area. Best to check directly with your carrier prior to arrival.</p>
    </div>
  </div>
</template>
<script>
export default {
  name: 'contact-info',
  props: {
    reservation: {
      type: Object,
      required: true
    }
  }
};
</script>
