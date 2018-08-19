<template>
<div class="space-top">
  <div class="row margin-bottom">
    <div class="col-md-6">
      <div  v-if="isNew">
        <div class="alert alert-danger" v-show="form.errors.has('escape_type_id')">
          Please choose an Escape Type
        </div>
        <label>Type</label>
        <type-select v-on:change="onTypeChange"></type-select>
      </div>
    </div>
  </div>
  <div class="row margin-bottom">
    <div class="col-md-12 margin-bottom">
       <h4><i class="fa fa-calendar"></i> Date</h4>
    </div>
    <div class="col-md-6">
      <label>Start Date</label>
      <div class="alert alert-danger" v-show="form.errors.has('start_date')">
          {{ form.errors.get('start_date') }}
      </div>
      <datepicker
      input-class="form-control"
      :value="form.start_date"
      v-on:selected="setStartDate"
      format="MMM dd, yyyy"></datepicker>
    </div>
    <div class="col-md-6">
      <label>End Date</label>
      <div class="alert alert-danger" v-show="form.errors.has('end_date')">
          {{ form.errors.get('end_date') }}
      </div>
      <datepicker
      input-class="form-control"
      :value="form.end_date"
      v-on:selected="setEndDate"
      format="MMM dd, yyyy"></datepicker>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 margin-bottom">
       <h4><i class="fa fa-bed"></i> Available Beds</h4>
    </div>
    <div class="col-md-6">
      <label>Single Beds</label>
      <div class="alert alert-danger" v-show="form.errors.has('single_rooms')">
          {{ form.errors.get('single_rooms') }}
      </div>
      <input
        type="number"
        class="form-control"
        v-model="singleRooms"
        name="single_rooms"
        />
    </div>
    <div class="col-md-6">
      <label>Shared Beds</label>
      <div class="alert alert-danger" v-show="form.errors.has('shared_rooms')">
          {{ form.errors.get('shared_rooms') }}
      </div>
      <input
        type="number"
        name="shared_rooms"
        v-model="sharedRooms"
        class="form-control" />
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 margin-bottom">
       <h4><i class="fa fa-dollar"></i> Pricing</h4>
    </div>
    <div class="col-md-6">
      <label>Single Room Rate</label>
      <div class="alert alert-danger" v-show="form.errors.has('single_rate')">
          {{ form.errors.get('single_rate') }}
      </div>
      <div class="input-group">
        <span class="input-group-addon">$</span>
        <input
          type="number"
          v-model="formattedSingleRate"
          class="form-control" />
      </div>
    </div>
    <div class="col-md-6">
      <label>Shared Room Rate</label>
      <div class="alert alert-danger" v-show="form.errors.has('shared_rate')">
          {{ form.errors.get('shared_rate') }}
      </div>
      <div class="input-group">
        <span class="input-group-addon">$</span>
        <input
          type="number"
          v-model="formattedSharedRate"
          class="form-control" />
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <label>Deposit Amount</label>
      <div class="alert alert-danger" v-show="form.errors.has('deposit_amount')">
          {{ form.errors.get('deposit_amount') }}
      </div>
      <div class="input-group">
        <span class="input-group-addon">$</span>
        <input
          type="number"
          v-model="formattedDepositAmount"
          class="form-control" />
      </div>
    </div>
    <div class="col-md-6">
      <label>Payment Due Date</label>
      <div class="alert alert-danger" v-show="form.errors.has('payment_due')">
          {{ form.errors.get('payment_due') }}
      </div>
      <datepicker
      input-class="form-control"
      :value="form.payment_due"
      v-on:selected="setPaymentDue"
      format="MMM dd, yyyy"></datepicker>
    </div>
  </div>
  <div class="row space-top">
    <div class="col-md-8">
      <label>Contact Info</label>
      <tiny-mce :other-props="tinymceOptions"
      id="unique_summary"
      v-model="form.contact_info"></tiny-mce>
       <iframe id="frameUpload" name="frameUpload" style="display:none"></iframe>
       <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
    </div>
  </div>
  <div class="row space-top">
    <div class="col-md-12">
      <button class="btn btn-primary pull-right" v-on:click="saveEscape">
        Save
      </button>
    </div>
  </div>
</div>
</template>
<script>
import { tinymceOptions } from '../../../../forms/tinymce';
import TinyMce from 'tinymce-vue-2';
import Datepicker from 'vuejs-datepicker';
import moment from 'moment';
import TypeSelect from '../type-select.vue';
import BrochureUpload from './brochure-upload.vue';
export default {
	name: 'settings',
	components: {
		Datepicker,
		TypeSelect,
		TinyMce,
		BrochureUpload,
	},
	data: () => ({
		tinymceOptions,
	}),
	props: {
		form: {
			type: Object,
			required: true,
		},
	},
	methods: {
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
					})
					.catch(err => console.log(err));
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
		onBrochureChange(brochure) {
			this.form.new_brochure = brochure.id;
		},
		uploadInlineImage(value) {
			const data = new FormData();
			data.append('inline_image', value.target.files[0]);
			axios
				.post(`/api/media`, data)
				.then(res => {
					var url = res.data.inline_image.fullSize;
					this.setInlineImage(url);
				})
				.catch(err => console.log(err));
		},
		setInlineImage(url) {
			top
				.$('.mce-btn.mce-open')
				.parent()
				.find('.mce-textbox')
				.val(url);
		},
	},
	computed: {
		formattedSingleRate: {
			get: function() {
				return this.formatValue(this.form.single_rate);
			},
			set: function(value) {
				this.form.single_rate = value * 100;
			},
		},
		formattedDepositAmount: {
			get: function() {
				return this.formatValue(this.form.deposit_amount);
			},
			set: function(value) {
				this.form.deposit_amount = value * 100;
			},
		},
		formattedSharedRate: {
			get: function() {
				return this.formatValue(this.form.shared_rate);
			},
			set: function(value) {
				this.form.shared_rate = value * 100;
			},
		},
		singleRooms: {
			get: function() {
				return this.form.available_single_rooms;
			},
			set: function(value) {
				if (!this.isNew) {
					const change = value - this.form.available_single_rooms;
					this.form.single_rooms = this.form.single_rooms + change;
					this.form.available_single_rooms = value;
				} else {
					this.form.single_rooms = value;
					this.form.available_single_rooms = value;
				}
			},
		},
		sharedRooms: {
			get: function() {
				return this.form.available_shared_rooms;
			},
			set: function(value) {
				if (!this.isNew) {
					const change = value - this.form.available_shared_rooms;
					this.form.shared_rooms = this.form.shared_rooms + change;
					this.form.available_shared_rooms = value;
				} else {
					this.form.shared_rooms = value;
					this.form.available_shared_rooms = value;
				}
			},
		},
		isNew() {
			return this.$route.params.id === 'new';
		},
	},
};
</script>
