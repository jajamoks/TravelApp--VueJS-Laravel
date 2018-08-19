<template>
  <div class="panel">
    <div class="panel-heading">
      <h5><i class="fa fa-credit-card"></i>&nbsp;Payments</h5>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="alert" v-if="loaded" :class="{
                'alert-danger': balance > 0,
                'alert-success': balance === 0
                }">
                Balance : ${{balance}}
              </div>
            </div>
          </div>
          <div class="row" v-if="balance > 0 && loaded">
            <div class="col-md-12">
              <div class="form-group" :class="{
                'has-error': form.errors.has('credit_card_number')
              }">
                <label>Credit Card Number</label>
                <input class="form-control " name="credit_card_number" v-model="form.credit_card_number" />
              </div>
            </div>
            <div class="col-md-12">
                <label for="expiry_date">Expiration Date</label>
                <div class="form-inline">
                  <div class="form-group" :class="{
                    'has-error': form.errors.has('expiration_month')
                  }">
                    <input
                    class="form-control" v-model="form.expiration_month"
                    type="number" name="expiration_month" placeholder="MM" value="" required />
                  </div>
                  <div class="form-group" :class="{
                    'has-error': form.errors.has('expiration_year')
                  }">
                    <input
                    class="form-control"
                    type="number" name="expiration_year"
                    placeholder="YYYY"
                    v-model="form.expiration_year"
                     required />

                  </div>
                </div>
                <div class="alert alert-danger" v-if="form.errors.has('expiration_month') || form.errors.has('expiration_year')">
                    {{form.errors.get('expiration_month')}} {{form.errors.get('expiration_year')}}
                </div>
            </div>
            <div class="col-md-4">
              <label for="expiry_date">CVV Code</label>
                <div class="form-group" :class="{
                  'has-error': form.errors.has('cvv_code')
                }">
                  <input
                    class="form-control"
                    type="number" name="cvv_code"
                    v-model="form.cvv_code"
                    required />
                </div>
            </div>
            <div class="col-md-8 form-submit text-center space-bottom">
              <button class="btn btn-primary btn-primary-filled btn-lg" @click="submitPayment" :disabled="sending">Submit</button>
            </div>
            </div>
            <div v-else-if="payment_success">
              <div class="well text-center">
                <h1>Thank You!</h1>
                <p>Check your email for your receipt.</p>
              </div>
            </div>
            <div class="row" v-if="payment_error">
              <div class="col-md-12">
                <div class="alert alert-danger">
                  {{payment_error}}
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-6">
          <h5>Past Payments</h5>
          <table class="table table-condensed">
            <thead>
              <th>Date</th>
              <th>Amount</th>
            </thead>
            <tbody>
              <tr v-for="payment in reservation.payments" :key="payment.id">
                <td>{{displayDate(payment.created_at)}}</td>
                <td>${{toDollars(payment.amount)}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import moment from 'moment';
export default {
	name: 'payment',
	props: {
		reservation: {
			type: Object,
			required: true,
		},
		loaded: {
			type: Boolean,
			required: true,
		},
	},
	data: () => ({
		form: new Form({
			expiration_month: null,
			expiration_year: null,
			credit_card_number: null,
			cvv_code: null,
		}),
		payment_error: false,
		payment_success: false,
		sending: false,
	}),
	methods: {
		toDollars(value) {
			return value / 100;
		},
		displayDate(date) {
			return moment(date).format('MMMM Do, YYYY');
		},
		submitPayment() {
			this.payment_error = false;
			this.sending = true;
			const { id } = this.reservation;
			Form.post(`/api/user/reservations/${id}/payment`, this.form)
				.then(res => {
					this.payment_success = true;
					this.sending = false;
					this.$emit('successful-payment');
				})
				.catch(err => {
					this.sending = false;
					this.payment_error = err.message;
				});
		},
	},
	computed: {
		balance() {
			return this.toDollars(this.reservation.current_balance);
		},
	},
};
</script>
<style scoped>
.form-submit {
	padding-top: 20px;
	height: 100%;
}
</style>
