<template>
  <div class="panel">
    <div class="panel-heading">
      <h5> <i class="fa fa-edit"></i>&nbsp;Waiver</h5>
    </div>
    <div class="panel-body">
      <div class="row waiver-text-box space-bottom">
        <div class="col-md-12">
        <p>As a condition of my agreement with Escape to Shape, I represent and warrant that I have read and understand the following terms, and I agree to them in full.</p>
        <p>
        I understand that neither Escape To Shape LLC, its employees, subsidiaries and/or affiliates, owns or operates any entity which provides goods or services for my trip including but not limited to, lodging facilities, transportation companies, food service providers, equipment suppliers, etc. As such, I agree that Escape To Shape LLC, nor their respective employees, subsidiaries and/or affiliates, is liable to me or any of my group for any negligent or willful act, or failure to act, by any other third party.
        <p>
        I hereby certify that I am reasonably suited to participate in Escape to Shape and I do not have any physical impairment that would adversely affect my participation.  I hereby agree to accept responsibility for my own welfare and I accept any and all risks of delay, unanticipated events, inconvenience, illness, injury, emotional trauma or death, or acts of God/force majeure.</p>
        <p>
        I, on behalf of myself and my executors and administrators, exempt, release, and forever discharge Escape To Shape LLC and their respective directors, officers, agents, employees and instructors, and waive any and all claims which may occur from any cause whatsoever during or arising from my participation in Escape to Shape, including but not limited to any injury to me or members of my group or damage to my property or my group’s property.  Escape To Shape LLC shall not be responsible for, and specifically disclaim, any liability for any loss, theft, injury or liability incurred while participating in Escape to Shape, except if resulting significantly from the gross negligence of Escape To Shape LLC or their employees.  I agree that this release shall be legally binding upon me personally and all members of my family or group.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group" :class="{
            'has-error': form.errors.has('name')
            }">
            <label>Name</label>
            <input class="form-control" type="text" v-model="form.name"/>
          </div>
          <div class="alert alert-danger" v-if="form.errors.has('name')">
            Name is required.
          </div>
          <div class="form-group" :class="{
            'has-error': form.errors.has('signature')
            }">
            <label>Electonic Signature</label>
            <input class="form-control" type="text" v-model="form.signature"/>
          </div>
          <div class="alert alert-danger" v-if="form.errors.has('signature')">
            Signature is required.
          </div>
          <div class="form-group" :class="{
            'has-error': form.errors.has('signed_on')
            }">
            <label>Date</label>
            <input class="form-control" type="text" placeholder="XX/XX/XXXX" v-model="form.signed_on"/>
          </div>
          <div class="alert alert-danger" v-if="form.errors.has('signed_on')">
            Date is required.
          </div>
          <div class="form-group" :class="{
            'has-error': form.errors.has('signature_confirmed')
            }">
            <div class="checkbox">
              <label>
                <input type="checkbox" v-model="form.signature_confirmed"> By checking this box I confirm that the ELECTRONIC SIGNATURE on this form is to be considered valid as my actual signature.
              </label>
            </div>
            <div class="alert alert-danger" v-if="form.errors.has('signature_confirmed')">
              Confirmation of signature is required.
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <button class="btn btn-info btn-info-filled pull-right" @click="save" :disabled="this.form.busy">
            <span v-if="!this.form.busy">Save</span>
            <span v-else>
              <i class="fa fa-spin fa-spinner"></i>
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'waiver-form',
  props: {
    reservation: {
      type: Object,
      required: true
    }
  },
  data: () => ({
    form: new Form({})
  }),
  methods: {
    save() {
      Form.post(
        `/api/user/reservations/${this.reservation.id}/waiver`,
        this.form
      ).then(response => {
        this.$emit('reservation-changed', response);
        this.$router.push({ name: 'my-escapes' });
      });
    }
  }
};
</script>
<style scoped>
  .waiver-text-box {
    max-height: 300px;
    overflow-y: scroll;
  }
</style>
