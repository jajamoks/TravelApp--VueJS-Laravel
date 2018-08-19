<template>
    <div class="panel">
        <div class="panel-heading">
            <h5><i class="fa fa-user"></i><span>&nbsp;Account Information</span></h5>
        </div>
        <div class="panel-body">
            <div class="space-top">
                <div class="row">
                    <div class="form-group col-md-6" :class="{
            'has-error': form.errors.has('email')
          }">
                        <label for="email">Change Email</label>
                        <input class="form-control" type="email" name="email" id="email" v-model="form.email" required/>
                        <span class="alert alert-danger"
                              v-if="form.errors.has('email')">{{form.errors.get('email')}}</span>
                    </div>
                    <div class="form-group col-md-6" :class="{
            'has-error': form.errors.has('password')
          }">
                        <label for="email">Change Password</label>
                        <input class="form-control" type="password" name="password" id="password"
                               v-model="form.password" required/>
                        <span class="alert alert-danger" v-if="form.errors.has('password')">{{form.errors.get('password')}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-info btn-info-filled pull-right" @click="save"
                                :disabled="this.form.busy">
                            <span v-if="!this.form.busy">Save</span>
                            <span v-else>
                <i class="fa fa-spin fa-spinner"></i>
              </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import swal from 'sweetalert2';
    export default {
        name: 'account-form',
        props: {
            form: {
                type: Object,
                required: true
            }
        },
        methods: {
            save() {
                Form.put('/api/user/account', this.form).then(response => {
                    if (response) {
                        this.$emit('profile-change', response);
                        swal({
                            title: 'Update !',
                            text: "Information updated !",
                            type: 'success',
                        })
                    }
                });
            }
        }
    };
</script>
