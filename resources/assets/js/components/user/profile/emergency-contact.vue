<template>
    <div class="panel">
        <div class="panel-heading">
            <h5><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;Emergency Contact</h5>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <emergency-contact-question :form="form"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-info btn-info-filled pull-right" @click="save" :disabled="form.busy">
                        <span v-if="!form.busy">Save</span>
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
    import EmergencyContactQuestion from './questions/emergency-contact.vue';
    import swal from 'sweetalert2';

    export default {
        name: 'emergency-contact',
        components: {
            EmergencyContactQuestion
        },
        props: {
            form: {
                type: Object,
                required: true
            }
        },
        methods: {
            save() {
                Form.put('/api/user/contact', this.form)
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
