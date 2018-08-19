<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5><i class="fa fa-heartbeat"></i>&nbsp; Health Information</h5>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <yoga-question :form="form"/>
                    <activities-question :form="form"/>
                    <medical-issues-question :form="form"/>
                    <goals-question :form="form"/>
                    <additional-info-question :form="form"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-info btn-info-filled pull-right" @click="save">
                        <span v-if="!form.busy">Save</span>
                        <span v-else><i class="fa fa-spinner fa-spin"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import YogaQuestion from './questions/yoga.vue';
    import ActivitiesQuestion from './questions/activities.vue';
    import MedicalIssuesQuestion from './questions/medical-issues.vue';
    import GoalsQuestion from './questions/goals.vue';
    import AdditionalInfoQuestion from './questions/additional-info.vue';
    import swal from 'sweetalert2';

    export default {
        name: 'health-info',
        components: {
            YogaQuestion,
            ActivitiesQuestion,
            MedicalIssuesQuestion,
            GoalsQuestion,
            AdditionalInfoQuestion
        },
        props: {
            form: {
                type: Object,
                required: true
            }
        },
        methods: {
            save() {
                Form.put(`/api/user/health`, this.form).then(response => {
                    this.$emit('profile-change', response);
                    swal({
                        title: 'Update !',
                        text: "Information updated !",
                        type: 'success',
                    })
                });
            }
        }
    };
</script>
