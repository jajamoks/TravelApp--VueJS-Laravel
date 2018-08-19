<template>
<div class="panel">
  <div class="panel-heading">
    <h5><i class="fa fa-calendar-o"></i>&nbsp;Itinerary</h5>
  </div>
  <div class="panel-body">
    <div class="btn-group hidden-xs" role="group" aria-label="..." >
      <button type="button" class="btn btn-default" v-for="day in daysInEscape" @click="currentDay = day" :class="{
        'active' : isSelectedDay(day)
      }">
        <div class="calendar-day-select-date">{{day.format('MM/D')}}</div>
        <div class="calendar-day-select-day">{{day.format('ddd')}}</div>
      </button>
    </div>
    <div class="form-group hidden-md hidden-sm hidden-lg">
      <label>Day</label>
      <select v-model="currentDay" class="form-control">
        <option v-for="day in daysInEscape" :value="day">{{day.format('ddd')}} {{day.format('MM/D')}}</option>
      </select>
    </div>
    <div class="row space-top">
      <div class="col-md-12" v-if="currentActivities.length > 0">
        <itinerary-activity v-for="activity in currentActivities" :activity="activity" />
      </div>
      <div class="col-md-12" v-else>
        <div class="alert alert-info">
          No currently scheduled activities
        </div>
      </div>
    </div>
  </div>
</div>
</template>
<script>
import moment from 'moment';
import { range, sortBy } from 'lodash';
import ItineraryActivity from './itinerary-activity.vue';
export default {
  name: 'itinerary',
  components: {
    ItineraryActivity
  },
  props: {
    reservation: {
      type: Object,
      required: true
    }
  },
  data: () => ({
    currentDay: moment()
  }),
  methods: {
    isSelectedDay(day) {
      return moment(day).isSame(this.currentDay, 'day');
    }
  },
  computed: {
    daysInEscape() {
      var startDate = moment(this.reservation.escape.start_date);
      var endDate = moment(this.reservation.escape.end_date);
      var days = endDate.diff(startDate, 'days');
      return range(days + 1).map(day => {
        if (day === 0) return startDate;
        return moment(startDate).add(day, 'd');
      });
    },
    currentActivities() {
      return sortBy(
        this.reservation.escape.itinerary.activities.filter(act => {
          return this.currentDay.isSame(moment(act.date), 'day');
        }),
        'date'
      );
    }
  },
  watch: {
    reservation: function(val) {
      const startDate = moment(val.escape.start_date);
      if (this.currentDay.isBefore(startDate)) {
        this.currentDay = startDate;
      }
    }
  },
  mounted() {
    if (this.reservation.escape.start_date) {
      const startDate = moment(this.reservation.escape.start_date);
      if (this.currentDay.isBefore(startDate)) {
        this.currentDay = startDate;
      }
    }
  }
};
</script>
<style scoped>
.btn-default {
  border: 1px solid;
}

</style>
