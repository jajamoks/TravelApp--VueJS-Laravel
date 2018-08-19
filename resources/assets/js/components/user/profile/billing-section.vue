<template>
    <div class="panel">
        <div class="panel-heading">
            <h5><i class="fa fa-credit-card"></i>&nbsp;<span>Billing Information</span></h5>
        </div>
        <div class="panel-body">
            <billing-form :form="form"/>
            <div class="row">
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
    import BillingForm from './billing-form.vue';
    import swal from 'sweetalert2';

    export default {
        name: 'billing-section',
        components: {
            BillingForm
        },
        props: {
            form: {
                type: Object,
                required: true
            }
        },
        methods: {
            save() {
                Form.put('/api/user/billing', this.form)
                    .then(response => {
                        this.$emit('profile-change', response);
                        swal({
                            title: 'Update !',
                            text: "Information updated !",
                            type: 'success',
                        })
                    })
                    .catch(err => {
                    });
            }
        }
    };
</script>
