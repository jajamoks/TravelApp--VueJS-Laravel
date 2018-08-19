<template>
  <div class="panel">
    <div class="panel-heading">
        <h5><i class="fa fa-info-circle"></i>&nbsp;<span>Additional Information</span></h5>
    </div>
    <div class="panel-body">
      <div class="row">
          <div class="col-sm-12">
            <label><i class="fa fa-gift"></i>Birthday</label>
          </div>
          <div class="col-sm-4">
                <label>Month</label>
                <input type="number" min="1" max="12"
          class="form-control" v-model="month" />
          </div>
          <div class="col-sm-4">
              <label>Day</label>
              <input type="number" min="1" max="31" class="form-control" v-model="day" />
          </div>
      </div>
      <div class="row">
          <button class="btn btn-info btn-info-filled pull-right" @click="save" :disabled="this.form.busy">
            <span v-if="!this.form.busy">Save</span>
            <span v-else>
              <i class="fa fa-spin fa-spinner"></i>
            </span>
          </button>
      </div>
    </div>
  </div>
</template>

<script>
import moment from 'moment';
import swal from 'sweetalert2';
export default {
	name: 'additional-info',
	props: {
		form: {
			type: Object,
			required: true,
		},
	},
	methods: {
		save() {
			Form.put('/api/user/additional-info', this.form)
				.then(response => {
                    swal({
                        title: 'Update !',
                        text: "Information updated !",
                        type: 'success',
                    })
					this.$emit('profile-change', response);
				})
				.catch(err => {});
		},
	},
	computed: {
		month: {
			get() {
				const { birthday } = this.form.profile;
				if (birthday) {
					return moment(birthday).month() + 1;
				}
				return moment().month() + 1;
			},
			set(value) {
				if (value && value > 0 && value <= 12) {
					const { birthday } = this.form.profile;
					var current = moment().clone();
					if (birthday) {
						current = moment(birthday).clone();
					}
					this.form.profile.birthday = current
						.year(current.year())
						.month(value - 1)
						.date(current.date())
						.format('YYYY-MM-DD hh:mm:ss');
				}
			},
		},
		day: {
			get() {
				const { birthday } = this.form.profile;
				if (birthday) {
					return moment(birthday).date();
				}
				return moment().date();
			},
			set(value) {
				if (value && value > 0 && value <= 31) {
					const { birthday } = this.form.profile;
					var current = moment().clone();
					if (birthday) {
						current = moment(birthday).clone();
					}
					this.form.profile.birthday = current
						.year(current.year())
						.month(current.month())
						.date(value)
						.format('YYYY-MM-DD hh:mm:ss');
				}
			},
		},
	},
};
</script>

<style>

</style>
