<template>
  <div class="space-top">
    <button type="button" class="btn btn-default" data-toggle="modal"  :data-target="`#fileUpload-${uniqueId}`" :disabled="uploading">
      <span v-if="uploading"><i class="fa fa-spinner fa-spin"></i></span>
      <span v-else-if="currentImage">Change Image</span>
      <span v-else>Add Image</span>
    </button>
    <div class="modal fade" tabindex="-1" role="dialog" :id="`fileUpload-${uniqueId}`" ref="modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Image</h4>
          </div>
          <div class="modal-body">
            <label class="btn btn-default btn-file pull-right select-button">
              <span v-if="!uploading">
              Select Image <input ref="featured_image" type="file" class="form-control" name="featured_image" @change="setImage">
              </span>
              <span v-else>
                <i class="fa fa-spinner fa-spin"></i>
              </span>
            </label>
              <div>
                  <cropper v-if="imgSrc"
                      ref='cropper'
                      :guides="true"
                      :view-mode="1"
                      drag-mode="crop"
                      :background="true"
                      :rotatable="false"
                      :movable="true"
                      :zoomable="true"
                      :zoom="debouncedCrop"
                      :src="imgSrc"
                      alt=" "
                      :ready="autoCrop"
                      :autoCrop="true"
                      :img-style="{ width: '90%' }"
                      :cropmove="debouncedCrop">
                  </cropper>
                  <div class="row space-top">
                    <div class="col-md-4">
                      <div v-if="cropImg.length" class="controls-container">
                        <button class="btn btn-sm btn-default" @click="zoomIn">
                          <i class="fa fa-search-plus" />
                        </button>
                        <button class="btn btn-sm btn-default" @click="zoomOut">
                            <i class="fa fa-search-minus" />
                        </button>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="display-image-container center-block"
                      v-if="cropImg.length" :style="`background-image: url(${cropImg}); width:${previewWidth}px; height: ${previewHeight}px;`">
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" @click="clear">Close</button>
            <button type="button" class="btn btn-primary" @click="save" v-if="!uploading && cropImg.length">Save</button>
            <button type="button" class="btn btn-primary" v-else-if="uploading">
              <i class="fa fa-spinner fa-spin"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Cropper from 'vue-cropperjs';
import { debounce } from 'lodash';
export default {
  name: 'image-upload',
  props: {
    displayWidth: {
      type: Number,
      required: true
    },
    displayHeight: {
      type: Number,
      required: true
    },
    currentImage: {
      type: String,
      required: false
    },
    uploading: {
      type: Boolean,
      required: true
    },
    uniqueId: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      imgSrc: '',
      cropImg: ''
    };
  },
  components: {
    Cropper
  },
  methods: {
    autoCrop() {
      this.cropImage();
    },
    zoomIn() {
      this.$refs.cropper.zoom(0.05);
      this.cropImage();
    },
    zoomOut() {
      this.$refs.cropper.zoom(-0.05);
      this.cropImage();
    },
    clear() {
      this.cropImg = '';
      this.imgSrc = '';
      this.$refs.cropper.reset();
    },
    setImage(e) {
      const file = e.target.files[0];

      if (!file.type.includes('image/')) {
        alert('Please select an image file');
        return;
      }

      if (typeof FileReader === 'function') {
        const reader = new FileReader();

        reader.onload = event => {
          if (event.target.result) {
            this.imgSrc = event.target.result;
            // rebuild cropperjs with the updated source
            //this.$refs.cropper.replace(event.target.result);
          }
        };

        reader.readAsDataURL(file);
      } else {
        alert('Sorry, FileReader API not supported');
      }
    },
    debouncedCrop: debounce(function() {
      this.cropImage();
    }, 300),
    cropImage() {
      this.cropImg = this.$refs.cropper.getCroppedCanvas().toDataURL();
    },
    dataURItoBlob(dataURI) {
      // convert base64/URLEncoded data component to raw binary data held in a string
      var byteString;
      if (dataURI.split(',')[0].indexOf('base64') >= 0)
        byteString = atob(dataURI.split(',')[1]);
      else byteString = unescape(dataURI.split(',')[1]);

      // separate out the mime component
      var mimeString = dataURI
        .split(',')[0]
        .split(':')[1]
        .split(';')[0];

      // write the bytes of the string to a typed array
      var ia = new Uint8Array(byteString.length);
      for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
      }

      var blob = new Blob([ia], { type: mimeString });
      var fileOfBlob = new File([blob], new Date().getTime(), {
        type: mimeString
      });
      return fileOfBlob.slice();
    },
    save() {
      this.$emit('save', this.dataURItoBlob(this.cropImg));
      this.clear();
      $(this.$refs.modal).modal('toggle');
    }
  },
  computed: {
    previewWidth() {
      return this.displayWidth / 4;
    },
    previewHeight() {
      return this.displayHeight / 4;
    }
  }
};
</script>
<style scoped>
.select-button {
  display: block;
  margin-bottom: 10px;
}
.select-button:after {
  content: '';
  clear: both;
}
.controls-container:after {
  content: '';
  clear: both;
}
.display-image-container {
  border: 1px solid;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
}
</style>
