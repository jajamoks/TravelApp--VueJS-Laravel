<template>
<div>
  <div class="featured-image">
      <img  v-bind:src="currentImage" class="img-responsive center-block" />
      <image-upload
      :displayWidth="1024"
      :displayHeight="500"
      :currentImage="currentImage"
      v-on:save="update"
      uniqueId="featured"
      :uploading="uploading" />
  </div>
</div>
</template>
<script>
import ImageUpload from '../../image-upload.vue';
export default {
  name: 'featured-image',
  props: ['image', 'errors'],
  components: {
    ImageUpload
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
      this.form.busy = true;
      this.uploading = true;
      const data = new FormData();
      data.append('featured_image', file, new Date().getTime());
      axios
        .post('/api/media', data)
        .then(res => {
            if(res.data.length != 0){
                if(res.data.featured_image == 'error'){
                    this.uploading = false;
                    alert('error while uploading files,filesize is too large ....!');
                }else {
                    this.$emit('image-change', res.data.featured_image);
                    this.uploading = false;
                }
            }else{
                this.uploading = false;
                alert('error while uploading files,filesize is too large ....!');
            }
        })
        .catch(err => {
          this.form.busy = false;
        });
    }
  },
  computed: {
    currentImage() {
      return this.image ? this.image.secure_url : '';
    }
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
</style>
