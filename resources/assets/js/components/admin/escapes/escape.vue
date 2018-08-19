<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading withButton">
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <span v-if="!isNew">{{form.escape_type.name}} | {{form.escape_type.location}} | {{form.display_date}}</span>
                                <span v-else>Create New Escape</span>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <copy-lists-modal :escape="form" />
                                <button style="vertical-align: top;" class="btn pull-right-desktop1 btn-sm btn-danger"
                                        @click="deleteEscape" v-if="!isNew">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                <router-link :to="{name: 'upcoming-escapes'}" tag="button"
                                    class="btn btn-sm pull-right1 btn-danger pull-right1" style="margin-right:10px; vertical-align:top;">Cancel
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div v-if="success" class="alert alert-success" role="alert">
                            <strong>Saved!</strong>
                        </div>
                        <ul class="nav nav-tabs hidden-sm hidden-xs">
                            <router-link :to="{name: 'reservations', params: {id: form.id}}" active-class="active" if=""
                                         tag="li" v-if="!isNew">
                                <a href="#">Reservations</a>
                            </router-link>
                            <router-link :to="{name: 'settings', params: {id: form.id}}" active-class="active" tag="li">
                                <a href="#">Setting</a>
                            </router-link>
                            <router-link :to="{name: 'escape-brochure', params: {id: form.id}}" active-class="active"
                                         tag="li" v-if="!isNew">
                                <a href="#">Brochure</a>
                            </router-link>
                            <router-link :to="{name: 'escape-itinerary', params: {id: form.id}}" active-class="active"
                                         tag="li" v-if="!isNew">
                                <a href="#">Itinerary</a>
                            </router-link>
                            <router-link :to="{name: 'escape-packing-list', params: {id: form.id}}"
                                         active-class="active" tag="li" v-if="!isNew">
                                <a href="#">Packing List</a>
                            </router-link>
                            <router-link :to="{name: 'escape-reading-list', params: {id: form.id}}"
                                         active-class="active" tag="li" v-if="!isNew">
                                <a href="#">Reading List</a>
                            </router-link>
                        </ul>

                        <select class="form-control hidden-md hidden-lg space-bottom" v-model="route" :disabled="isNew">
                            <option value="reservations" v-if="!isNew">Reservations</option>
                            <option value="settings">Settings</option>
                            <option value="escape-brochure" v-if="!isNew">Brochure</option>
                            <option value="escape-itinerary" v-if="!isNew">Itinerary</option>
                            <option value="escape-packing-list" v-if="!isNew">Packing List</option>
                            <option value="escape-reading-list" v-if="!isNew">Reading List</option>
                        </select>
                        <router-view :form="form" :loaded="hasLoaded" v-on:save="alertSuccess"></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
const formFields = {
  escape_type: {},
  deposit_amount: 0,
  shared_rate: 0,
  single_rate: 0,
  single_rooms: 0,
  shared_rooms: 0,
  available_single_rooms: 0,
  available_shared_rooms: 0,
  itinerary: {
    activities: []
  },
  packing_list: {
    items: []
  }
};
import CopyListsModal from './escape-sections/copy-lists-modal.vue';
export default {
  name: 'escape',
  components: {
    CopyListsModal
  },
  data: () => ({
    form: new Form(formFields),
    success: false,
    hasLoaded: false
  }),
  methods: {
    fetchEscape() {
      const { id } = this.$route.params;
      if (id !== 'new') {
        axios
          .get(`/api/escapes/${id}`)
          .then(res => {
            this.form = new Form(res.data);
            this.hasLoaded = true;
          })
          .catch(err => {
            console.log(err);
          });
      }
    },
    saveEscape() {
      if (this.form.id) {
        Form.put(`/api/escapes/${this.form.id}`, this.form)
          .then(res => {
            this.$router.push({ name: 'upcoming-escapes' });
          })
          .catch(err => console.log(err));
      } else {
        var data = this.form;
        data.escape_type_id = this.form.escape_type.id;
        Form.post(`/api/escapes`, data)
          .then(res => {
            this.$router.push({ name: 'upcoming-escapes' });
            this.form = new Form(formFields);
          })
          .catch(err => console.log(err));
      }
    },
    deleteEscape() {
      if (this.form.id) {
        const ack = confirm('Are you sure?');
        if (ack) {
          const { id } = this.$route.params;
          axios.delete(`/api/escapes/${id}`).then(() => {
            this.$router.push({ name: 'upcoming-escapes' });
          });
        }
      }
    },
    setStartDate(date) {
      this.form.start_date = moment(date).format('YYYY-MM-DD HH:MM:SS');
    },
    setEndDate(date) {
      this.form.end_date = moment(date).format('YYYY-MM-DD HH:MM:SS');
    },
    setPaymentDue(date) {
      this.form.payment_due = moment(date).format('YYYY-MM-DD HH:MM:SS');
    },
    setSingleRate(event) {
      this.form.single_rate = +event.target.value * 100;
    },
    setSharedRate(event) {
      this.form.shared_rate = +event.target.value * 100;
    },
    onTypeChange(type) {
      this.form.escape_type = type;
    },
    formatValue(value) {
      return value > 0 ? value / 100 : 0;
    },
    alertSuccess() {
      this.success = true;
      setTimeout(() => (this.success = false), 1000);
    }
  },
  computed: {
    formattedSingleRate: {
      get: function() {
        return this.formatValue(this.form.single_rate);
      },
      set: function(value) {
        this.form.single_rate = value * 100;
      }
    },
    formattedDepositAmount: {
      get: function() {
        return this.formatValue(this.form.deposit_amount);
      },
      set: function(value) {
        this.form.deposit_amount = value * 100;
      }
    },
    formattedSharedRate: {
      get: function() {
        return this.formatValue(this.form.shared_rate);
      },
      set: function(value) {
        this.form.shared_rate = value * 100;
      }
    },
    route: {
      get: function() {
        return this.$route.name;
      },
      set: function(val) {
        this.$router.push({ name: val, params: { id: this.form.id } });
      }
    },
    isNew() {
      return this.$route.params.id === 'new';
    }
  },
  mounted() {
    this.fetchEscape();
  }
};
</script>
