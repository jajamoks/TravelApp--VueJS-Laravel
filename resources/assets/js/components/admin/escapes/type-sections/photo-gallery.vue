<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <h3>Photo Gallery </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <featured-image
                        v-on:image-change="onImageChange"
                        :errors="form.errors"
                        :image="form.featured_image"></featured-image>
            </div>
            <div class="col-md-6">
                <div class="margin-bottom">
                    <image-upload
                            :displayWidth="1024"
                            :displayHeight="500"
                            v-on:save="update"
                            uniqueId="gallery"
                            :uploading="uploading"/>
                </div>
                <div class="row">
                    <draggable :list="form.gallery" @start="drag=true" @end="drag=false" @change="onReorder"
                               element="div" class="gallery-container">
                        <div v-for="(item, index) in form.gallery">
                            <div class="gallery-image margin-bottom">
                                <img class="img-responsive" v-bind:src="item.secure_url"/>
                                <div class="delete-button" @click="deleteImage(item)">
                                    <i class="fa fa-remove"></i>
                                </div>
                            </div>
                        </div>
                    </draggable>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import FeaturedImage from './featured-image.vue';
    import ImageUpload from '../../image-upload.vue';
    import draggable from 'vuedraggable';

    export default {
        name: 'photo-gallery',
        components: {
            ImageUpload
        },
        props: {
            form: {
                type: Object,
                required: true
            }
        },
        data: () => ({
            uploading: false
        }),
        methods: {
            onImageChange(value) {
                this.form.featured_image = value;
            },
            deleteImage(media) {
                const ack = confirm('Are you sure?');
                if (ack) {
                    axios
                        .delete(`/api/escape_types/${this.form.id}/gallery/${media.id}`)
                        .then(response => {
                            this.form.gallery = response.data.gallery;
                        });
                }
            },
            update(file) {
                this.form.busy = true;
                this.uploading = true;
                const data = new FormData();
                data.append('gallery', file);
                axios
                    .post('/api/media', data)
                    .then(res => {
                        if ( res.data.length != 0 ) {
                            if (res.data.gallery == 'error') {
                                this.uploading = false;
                                alert('error while uploading files,filesize is too large ....!');
                            } else {
                                const {id, secure_url} = res.data.gallery;
                                this.form.gallery.push({
                                    id,
                                    secure_url,
                                    order: this.form.gallery.length + 1
                                });
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
            onReorder() {
                let list = this.form.gallery.map((item, index) => {
                    if (item.pivot) {
                        item.pivot.order = index + 1;
                    } else {
                        item.order = index + 1;
                    }
                    return item;
                });
                this.form.gallery = list;
            }
        },
        beforeCreate() {
            this.$options.components.ImageUpload = require('../../image-upload.vue');
        },
        components: {
            FeaturedImage,
            draggable
        }
    };
</script>
<style scoped>
    input[type="file"] {
        display: none;
    }

    .feature-image {
        position: relative;
    }

    .featured-image-menu {
        padding: 5px;
    }

    .featured-label {
        display: inline-block;
        font-size: 1.2em;
        margin-left: 10px;
        margin-top: 5px;
    }

    .gallery-image {
        flex: auto;
        width: 120px;
        margin: .5vw;
        position: relative;
    }

    .gallery-image img {
        width: 100%;
        height: auto;

    }

    .gallery-image .delete-button {
        display: none;
        position: absolute;
        top: 0;
        right: 0;
        padding: 5px;
        background: rgba(0, 0, 0, .7);
        cursor: pointer;
    }

    .gallery-image .delete-button i {
        font-size: 1.5em;
        color: #fff;
    }

    .gallery-image:hover {
        cursor: grab;
    }

    .gallery-image:hover .delete-button {
        display: block;
    }

    .gallery-container {
        display: flex;
        flex-wrap: wrap;

    }
</style>
