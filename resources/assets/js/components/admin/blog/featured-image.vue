<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Featured Image</div>
            <div class="panel-body">
                <div class="alert alert-danger" v-show="errors.has('featured_image')">
                    {{ errors.get('featured_image') }}
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12 margin-bottom">
                            <label class="btn btn-default">
                                <input ref="featured_image" type="file" class="form-control" name="featured_image"
                                       @change="update">
                                Select Image
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
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
    </div>
</template>
<script>
    export default {
        name: 'featured-image',
        props: ['user', 'image', 'errors'],
        data() {
            return {
                form: {
                    busy: false
                },
                parentForm: {}
            };
        },
        methods: {
            update(e) {
                e.preventDefault();
                this.form.busy = true;
                axios
                    .post('/api/media', this.gatherFormData())
                    .then(res => {
                        if (res.data.length != 0) {
                            if (res.data.featured_image == 'error') {
                                this.form.busy = false;
                                alert('error while uploading files,filesize is too large ....!');
                            } else {
                                this.$emit('image-change', res.data.featured_image);
                                this.form.busy = false;
                            }
                        } else {
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
                data.append('featured_image', this.$refs.featured_image.files[0]);
                return data;
            }
        },
        computed: {
            /**
             * Calculate the style attribute for the photo preview.
             */
            previewStyle() {
                return `background-image: url(${this.image});
          background-size:contain;
          height:150px;
          min-width: 100%;
          background-repeat: no-repeat;`;
            }
        }
    };
</script>
