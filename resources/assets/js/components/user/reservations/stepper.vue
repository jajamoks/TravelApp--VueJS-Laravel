<template>
  <div class="modal fade" id="escape-config-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="">{{reservation.escape.escape_type.name}}</h4>
        </div>
        <div class="modal-body">
          <div class="step-tabs">
            <div class="step-tab" :class="{
              'touched-step' : currentStep >= 1
              }">
              <div class="step-tab-info">
                <div class="step-tab-info-link">
                  <i class="fa fa-user-circle"></i>&nbsp;Profile
                </div>
              </div>
            </div>
            <div class="step-tab" :class="{
              'touched-step' : currentStep >= 2
              }">>
              <div class="step-tab-info">
                  <div class="step-tab-info-link">
                    <i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp;Waiver
                  </div>
              </div>
            </div>
            <div class="step-tab" :class="{
              'touched-step' : currentStep >= 3
              }">>
              <div class="step-tab-info">
                <div class="step-tab-info-link">
                  <i class="fa fa-plane"></i>&nbsp;Airline Info
                </div>
              </div>
            </div>
          </div>
          <div class="step-tabs-content">
            <transition-group name="fade">
              <div class="step-tab-content" key="1" v-if="currentStep === 1">
                <h3>Step 1</h3>
              </div>
              <div class="step-tab-content" key="2" v-if="currentStep === 2">
                <waiver-form />
              </div>
              <div class="step-tab-content" key="3" v-if="currentStep === 3">
                <h3>Step 3</h3>
              </div>
            </transition-group>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info btn-info-filled" @click="currentStep += 1" v-if="currentStep < numSteps">Next</button>
          <button v-else type="button" class="btn btn-info btn-info-filled" @click="finish">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import WaiverForm from '../waiver/form.vue';
export default {
  name: 'stepper',
  components: {
    WaiverForm
  },
  props: {
    reservation: {
      type: Object,
      required: true
    }
  },
  data: () => ({
    currentStep: 1,
    numSteps: 3
  }),
  methods: {
    finish() {
      $('#escape-config-modal').modal('hide');
    }
  },
  mounted() {
    $('#escape-config-modal').modal('show');
  }
};
</script>
