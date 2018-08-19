<template>
    <div class="panel">
        <div class="panel-heading">
            <h5>
                <i class="fa fa-cutlery"></i>&nbsp;
                <span>Dietary Information</span>
            </h5>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="space-top">
                        <div class="form-group">
                            <label>
                                Do you have any dietary restrictions, allergies or foods you will not eat?
                            </label>
                            <div>
                                <label class="radio-inline">
                                    <input type="radio" name="dietary_restrictions" id="dietary_restrictions_yes"
                                           value="1" v-model="form.profile.diet_has_restrictions"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="dietary_restrictions" id="dietary_restrictions_no"
                                           value="0" v-model="form.profile.diet_has_restrictions"> No
                                </label>
                            </div>
                        </div>
                        <div class="form-group" v-if="isPositive" :class="{
              'has-error': form.errors.has('profile.diet_restrictions')
              }">
                            <label>Please list them below</label>
                            <textarea class="form-control" rows="4" v-model="form.profile.diet_restrictions"></textarea>
                        </div>
                        <div v-if="form.errors.has('profile.diet_restrictions')" class="alert alert-danger">
                            Please list your dietary restrictions
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-info btn-info-filled pull-right" @click="save" :disabled="form.busy">
                        <span v-if="!form.busy">Save</span>
                        <span v-else><i class="fa fa-spinner fa-spin"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import swal from 'sweetalert2';
    export default {
    name: 'diet-question',
        props
    :
    {
        form: {
            type: Object,
                required
        :
            true
        }
    }
    ,
    computed: {
        isPositive()
        {
            return this.form.profile.diet_has_restrictions == 1;
        }
    }
    ,
    methods: {
        save()
        {
            Form.put('/api/user/diet', this.form)
                .then(response => {
                    this.$emit('profile-change', response);
                    swal({
                        title: 'Update !',
                        text: "Information updated !",
                        type: 'success',
                    })
                })
                .catch(err => {
                    console.log(this.form.errors);
                });
        }
    }
    }
    ;
</script>
