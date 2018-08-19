<template>
    <div class="panel panel-default">
        <div class="panel-heading">Profile Image</div>
        <div class="panel-body">
            <div class="alert alert-danger" v-show="form.errors.has('media')">
                {{ form.errors.get('media') }}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <image-upload
                            :displayWidth="150"
                            :displayHeight="150"
                            v-on:save="update"
                            uniqueId="gallery"
                            :uploading="uploading"/>
                </div>
            </div>
            <div class="row space-top">
                <!-- Photo Preview-->
                <div class="form-group">
                    <div class="col-md-12 margin-bottom">
                        <div role="img" class="featured-image-preview"
                             :style="previewStyle">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import ImageUpload from '../image-upload.vue';

    export default {
        props: ['image', 'form'],
        components: {
            ImageUpload
        },
        data: () => ({
            uploading: false
        }),
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
                                this.uploading = false;
                                this.form.busy = false;
                                alert('error while uploading files,filesize is too large ....!');
                            } else {
                                this.$emit('image-change', res.data.image);
                                this.form.busy = false;
                                this.uploading = false;
                            }
                        } else {
                            this.uploading = false;
                            this.form.busy = false;
                            alert('error while uploading files,filesize is too large ....!');
                        }

                    })
                    .catch(err => {
                        this.form.busy = false;
                        this.uploading = false;
                    });
            },
            /**
             * Gather the form data for the photo upload.
             */
            gatherFormData() {
                return data;
            }
        },
        computed: {
            /**
             * Calculate the style attribute for the photo preview.
             */
            previewStyle() {
                return `background-image: url(${this.imagePreview});
          background-size:contain;
          height:150px;
          min-width: 100%;
          background-repeat: no-repeat;`;
            },
            imagePreview() {
                if (this.form.media) {
                    return this.form.media.secure_url;
                } else {
                    return '';
                }
            }
        }
    };
</script>
