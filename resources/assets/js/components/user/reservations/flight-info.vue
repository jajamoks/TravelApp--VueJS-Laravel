<template>
<div class="panel">
  <div class="panel-heading">
    <h5><i class="fa fa-plane"></i>&nbsp;Flight Information</h5>
  </div>
  <div class="panel-body">
    <h6>Arrival</h6>
    <hr />
    <div class="row">
      <div class="col-md-4">
        <div class="form-group" :class="{
          'has-error': form.errors.has('arrival_airline')
        }">
        <label>Arrival Airline</label>
        <input type="text" class="form-control"  v-model="form.arrival_airline"/>
        </div>
        <div v-if="form.errors.has('arrival_airline')" class="alert alert-danger">
          {{form.errors.get('arrival_airline')}}
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group" :class="{
          'has-error': form.errors.has('arrival_flight_number')
        }">
        <label>Arrival Flight Number</label>
        <input type="text" class="form-control"  v-model="form.arrival_flight_number"/>
        </div>
        <div v-if="form.errors.has('arrival_flight_number')" class="alert alert-danger">
          {{form.errors.get('arrival_flight_number')}}
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group" :class="{
          'has-error': form.errors.has('arrival_airport')
        }">
        <label>Arrival Airport</label>
        <input type="text" class="form-control"  v-model="form.arrival_airport"/>
        </div>
        <div v-if="form.errors.has('arrival_airport')" class="alert alert-danger">
          {{form.errors.get('arrival_airport')}}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group" :class="{
          'has-error': form.errors.has('arrival_date')
        }">
          <label>Arrival Date/Time (when your flight is scheduled to land)</label>
          <date-picker
            class="vue-depart-date-picker"
            id="arrive-date"
            name="vue-arrive-date-picker"
              v-model="arrivalDate"
          />
        </div>
      </div>
      <div class="col-md-8">
        <div v-if="form.errors.has('arrival_date')" class="alert alert-danger">
          {{form.errors.get('arrival_date')}}
        </div>
      </div>
    </div>
    <h6>Departure</h6>
    <hr />
    <div class="row">
      <div class="col-md-4 ">
        <div class="form-group" :class="{
          'has-error': form.errors.has('departure_airline')
        }">
        <label>Departure Airline</label>
        <input type="text" class="form-control"  v-model="form.departure_airline"/>
        </div>
        <div v-if="form.errors.has('departure_airline')" class="alert alert-danger">
          {{form.errors.get('departure_airline')}}
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group" :class="{
          'has-error': form.errors.has('departure_flight_number')
        }">
          <label>Departure Flight Number</label>
          <input type="text" class="form-control"  v-model="form.departure_flight_number"/>
        </div>
        <div v-if="form.errors.has('departure_flight_number')" class="alert alert-danger">
          {{form.errors.get('departure_flight_number')}}
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group" :class="{
          'has-error': form.errors.has('departure_airport')
        }">
        <label>Departure Airport</label>
        <input type="text" class="form-control"  v-model="form.departure_airport"/>
        </div>
        <div v-if="form.errors.has('departure_airport')" class="alert alert-danger">
          {{form.errors.get('departure_airport')}}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group" :class="{
          'has-error': form.errors.has('departure_date')
        }">
        <label>Departure Date/Time</label>
        <date-picker
          id="depart-date"
          name="vue-depart-date-picker"
          v-model="departDate"
        />
        </div>
      </div>
      <div class="col-md-8">
        <div v-if="form.errors.has('departure_date')" class="alert alert-danger">
          {{form.errors.get('departure_date')}}
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-info btn-info-filled pull-right" @click="save" :disabled="this.form.busy">
          <span v-if="!this.form.busy">Save</span>
          <span v-if="this.form.busy"><i class="fa fa-spinner fa-spin"></i></span>
        </button>
      </div>
    </div>
  </div>
</div>
</template>
<script>
import moment from 'moment';
import { debounce } from 'lodash';
const formFields = {
  arrival_airline: '',
  arrival_date: '',
  arrival_flight_number: '',
  departure_airline: '',
  departure_date: '',
  departure_flight_number: ''
};
export default {
  name: 'flight-info',
  data: () => ({
    form: new Form(formFields)
  }),
  props: {
    reservation: {
      type: Object,
      required: true
    }
  },
  watch: {
    reservation: function(val) {
      console.log(val.flight.departure_date);
      this.form = new Form(val.flight);
    }
  },
  mounted() {
    if (this.reservation.flight) {
      this.form = new Form(this.reservation.flight);
    }
  },
  computed: {
    departDate: {
      get: function() {
        return moment(this.form.departure_date);
      },
      set: function(val) {
        this.form.departure_date = val.format('YYYY-MM-DD HH:mm:ss');
      }
    },
    arrivalDate: {
      get: function() {
        return moment(this.form.arrival_date);
      },
      set: function(val) {
        this.form.arrival_date = val.format('YYYY-MM-DD HH:mm:ss');
      }
    }
  },
  methods: {
    save() {
      const { id } = this.reservation;
      if (this.form.id) {
        Form.put(
          `/api/user/reservations/${id}/flight/${this.form.id}`,
          this.form
        ).then(response => {
          this.reservation.flight = response;
        });
      } else {
        Form.post(`/api/user/reservations/${id}/flight`, this.form).then(
          response => {
            this.reservation.flight = response;
          }
        );
      }
    }
  }
};
</script>
