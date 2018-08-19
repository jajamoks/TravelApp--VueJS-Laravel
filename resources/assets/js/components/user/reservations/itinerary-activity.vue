<template>
  <div class="itinerary-activity">
    <hr />
    <div class="itinerary-activity-header">
      <span class="time">{{activity.time}}</span>&nbsp;{{activity.name}}
      <p>{{activity.description}}</p>
    </div>
  </div>
</template>
<script>
export default {
  name: 'itinerary-activity',
  props: {
    activity: {
      type: Object,
      required: true
    }
  }
};
</script>
<style scoped>
  .itinerary-activity-header {
    font-weight: bold;
  }
</style>
