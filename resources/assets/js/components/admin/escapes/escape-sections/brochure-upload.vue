<template>
    <div class="row space-top">
        <div class="col-md-6">
            <div class="form-group">
                <label class="btn btn-default btn-file">
          <span v-if="!uploading">
          Upload Brochure <input ref="brochure" type="file" class="form-control" name="brochure" @change="update">
          </span>
                    <span v-else>
            <i class="fa fa-spinner fa-spin"></i>
          </span>
                </label>
                <div class="well space-top" v-if="file">
                    <a :href="file" class="btn btn-info btn-small" target="_blank">
                        Preview
                    </a>
                    {{filename}}
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'brochure-upload',
        props: ['form'],
        data: () => ({
            uploading: false,
            preview: {}
        }),
        methods: {
            update(e) {
                e.preventDefault();
                this.uploading = true;
                axios
                    .post('/api/media', this.gatherFormData())
                    .then(res => {
                        if (res.data.length != 0) {
                            if (res.data.brochure == 'error') {
                                this.uploading = false;
                                alert('error while uploading files,filesize is too large ....!');
                            } else {
                                this.preview = res.data.brochure;
                                this.$emit('brochure-change', res.data.brochure);
                                this.uploading = false;
                            }
                        } else {
                            this.uploading = false;
                            alert('error while uploading files,filesize is too large ....!');
                        }

                    })
                    .catch(err => {
                        this.uploading = false;
                    });
            },
            /**
             * Gather the form data for the photo upload.
             */
            gatherFormData() {
                const data = new FormData();
                data.append('brochure', this.$refs.brochure.files[0]);
                return data;
            }
        },
        computed: {
            filename() {
                return this.file.split('/').pop();
            },
            file() {
                if (this.preview.secure_url) {
                    return this.preview.secure_url;
                } else if (this.form.brochure) {
                    return this.form.brochure.secure_url;
                }
                return null;
            }
        }
    };
</script>
<style scope>
    input[type="file"] {
        display: none;
    }
</style>
