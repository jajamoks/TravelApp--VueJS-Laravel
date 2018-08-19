<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Featured Image</div>
            <div class="panel-body">
                <div class="alert alert-danger" v-show="errors.has('image')">
                    {{ errors.get('image') }}
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12 margin-bottom">
                            <upload
                                    :displayWidth="400"
                                    :displayHeight="400"
                                    v-on:save="update"
                                    uniqueId="press"
                                    :uploading="form.busy"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Photo Preview-->
                    <div class="form-group">
                        <div class="col-md-12 margin-bottom">
                            <div v-if="image" role="img" class="featured-image-preview"
                                 :style="previewStyle">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Upload from '../image-upload.vue';

    export default {
        name: 'image-upload',
        components: {
            Upload
        },
        props: {
            image: {
                type: Object
            },
            errors: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                form: {
                    busy: false
                },
                parentForm: {},
                uploading: false
            };
        },
        methods: {
            update(file) {
                const data = new FormData();
                data.append('image', file);
                this.uploading = true;
                this.form.busy = true;
                axios
                    .post('/api/media', data)
                    .then(res => {
                        if (res.data.length != 0) {
                            if (res.data.image == 'error') {
                                this.form.busy = false;
                                this.form.busy = false;
                                alert('error while uploading files,filesize is too large ....!');
                            } else {
                                this.$emit('image-change', res.data.image);
                                this.form.busy = false;
                            }
                        } else {
                            this.form.busy = false;
                            this.form.busy = false;
                            alert('error while uploading files,filesize is too large ....!');
                        }
                    })
                    .catch(err => {
                        this.form.busy = false;
                    });
            },
            /**
             * Gather the form data for the photo upload.
             */
            gatherFormData() {
                const data = new FormData();
                data.append('image', this.$refs.image.files[0]);
                return data;
            }
        },
        computed: {
            /**
             * Calculate the style attribute for the photo preview.
             */
            previewStyle() {
                return `background-image: url(${this.image.fullSize});
          background-size:contain;
          height:150px;
          min-width: 100%;
          background-repeat: no-repeat;`;
            }
        }
    };
</script>
