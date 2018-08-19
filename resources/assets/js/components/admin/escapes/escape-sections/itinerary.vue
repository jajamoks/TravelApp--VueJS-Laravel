<template>
  <div>
    <h3>Itinerary</h3>
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
      <div class="col-md-6">
        <h4>Activities</h4>
        <hr />
        <div class="row" v-if="currentActivities.length > 0">
          <div class="col-md-12">
            <div class="panel-group" role="tablist">
              <div class="panel panel-default"  v-for="activity in currentActivities">
                <div class="panel-heading" role="tab">
                  <div class="pull-right panel-btn-container">
                  <button class="btn btn-sm btn-danger">
                    <i class="fa fa-remove" @click="remove(activity)"></i>
                  </button>
                  <button class="btn btn-sm btn-default">
                    <i class="fa fa-edit" @click="edit(activity)"></i>
                  </button>
                  </div>
                  <h4 class="panel-title">
                    <span class="activity-time">{{formatTime(activity.date)}}</span> {{activity.name}}
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" v-else>
          <div class="col-md-12">
            <div class="alert alert-info">
              No Activities Scheduled
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group" :class="{
          'has-error': activityForm.errors.has('name')
          }">
          <label>Name</label>
          <input class="form-control" type="text" v-model="activityForm.name"/>
          <div class="alert alert-danger" v-if="activityForm.errors.has('name')">
            {{activityForm.errors.get('name')}}
          </div>
        </div>
        <div class="form-group" :class="{
          'has-error': activityForm.errors.has('date')
          }">
          <label>Time</label>
          <input class="form-control" type="time" v-model="timeValue"/>
          <div class="alert alert-danger" v-if="activityForm.errors.has('date')">
            {{activityForm.errors.get('date')}}
          </div>
        </div>
        <div class="form-group" :class="{
          'has-error': activityForm.errors.has('description')
          }">
          <label>Description</label>
          <textarea rows="5" class="form-control" v-model="activityForm.description"></textarea>
          <div class="alert alert-danger" v-if="activityForm.errors.has('description')">
            {{activityForm.errors.get('description')}}
          </div>
        </div>
        <div class="form-group">
          <button class="btn btn-primary" @click="save">Save</button>
          <button class="btn btn-default" @click="clear">Clear</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import TinyMce from 'tinymce-vue-2';
import { tinymceOptions } from '../../../../forms/tinymce';
import moment from 'moment';
import axios from 'axios';
import { range, clone, sortBy } from 'lodash';
const formFields = {
  name: '',
  description: '',
  date: moment()
};
export default {
  name: 'itinerary',
  props: {
    form: {
      type: Object,
      required: true
    }
  },
  components: {
    TinyMce
  },
  data: () => {
    return {
      tinymceOptions,
      hasLoaded: false,
      activityForm: new Form(formFields),
      currentDay: moment()
    };
  },
  methods: {
    remove(activity) {
      var ack = confirm('Are you sure?');
      if (ack) {
        axios
          .delete(
            `/api/escapes/${this.form.id}/itinerary/${this.form.itinerary
              .id}/activities/${activity.id}`
          )
          .then(response => {
            this.form.itinerary.activities = response.data;
            this.clear();
          });
      }
    },
    save() {
      let resource = `/api/escapes/${this.form.id}/itinerary/${this.form
        .itinerary.id}/activities`;
      if (this.activityForm.id) {
        Form.put(
          `${resource}/${this.activityForm.id}`,
          this.activityForm
        ).then(response => {
          this.form.itinerary.activities = response;
          this.$emit('save');
          this.clear();
        });
      } else {
        Form.post(resource, this.activityForm).then(response => {
          this.form.itinerary.activities = response;
          this.$emit('save');
          this.clear();
        });
      }
    },
    edit(activity) {
      this.activityForm = new Form(activity);
    },
    isSelectedDay(day) {
      return moment(day).isSame(this.currentDay, 'day');
    },
    formatTime(date) {
      return moment(date).format('h:mma');
    },
    clear() {
      this.activityForm = new Form(formFields);
    }
  },
  computed: {
    daysInEscape() {
      var startDate = moment(this.form.start_date);
      var endDate = moment(this.form.end_date);
      var days = endDate.diff(startDate, 'days');
      return range(days + 1).map(day => {
        if (day === 0) return startDate;
        return moment(startDate).add(day, 'd');
      });
    },
    timeValue: {
      get() {
        var date = moment(this.activityForm.date).format('HH:mm');
        return date;
      },
      set(val) {
        const hours = val.split(':').shift();
        const mins = val.split(':').pop();
        const duration = moment.duration({ hours: +hours, minutes: +mins });
        this.activityForm.date = moment(this.currentDay)
          .add(duration)
          .format('YYYY-MM-DD HH:mm:ss');
      }
    },
    currentActivities() {
      return sortBy(
        this.form.itinerary.activities.filter(act => {
          return this.currentDay.isSame(moment(act.date), 'day');
        }),
        'date'
      );
    }
  },
  watch: {
    form: function(val) {
      this.currentDay = moment(val.start_date);
    }
  },
  mounted() {
    this.currentDay = moment(this.form.start_date);
  }
};
</script>
