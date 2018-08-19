<template>
  <div>
    <h3>Itinerary</h3>
    <div v-if="loaded">
      <tiny-mce :other-props="tinymceOptions"
      id="itinerary"
      v-model="form.itinerary"></tiny-mce>
       <iframe id="frameUpload" name="frameUpload" style="display:none"></iframe>
       <input ref="inline_image" name="image" style="display:none;" type="file" v-on:change="uploadInlineImage">
    </div>
  </div>
</template>
<script>
import TinyMce from 'tinymce-vue-2';
import { tinymceOptions } from '../../../../forms/tinymce';
export default {
  name: 'itinerary',
  props: {
    form: {
      type: Object,
      required: true
    },
    loaded: {
      type: Boolean,
      required: true
    }
  },
  components: {
    TinyMce
  },
  data: () => ({
    tinymceOptions
  }),
  methods: {
    uploadInlineImage(value) {
      const data = new FormData();
      data.append('inline_image', value.target.files[0]);
      axios
        .post(`/api/media`, data)
        .then(res => {
          var url = res.data.inline_image.fullSize;
          this.setInlineImage(url);
        })
        .catch(err => console.log(err));
    },
    setInlineImage(url) {
      top.$('.mce-btn.mce-open').parent().find('.mce-textbox').val(url);
    }
  }
};
</script>
