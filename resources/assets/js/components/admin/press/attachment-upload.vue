<template>
<div>
  <div class="panel panel-default">
    <div class="panel-heading">Attachment</div>
    <div class="panel-body">
      <div class="row">
        <div class="form-group">
          <div class="col-md-12 margin-bottom">
            <label class="btn btn-default btn-file">
              Browse <input ref="attachment" type="file" style="display:none;" name="attachment" @change="update">
            </label>
          </div>
        </div>
      </div>
      <div class="row">
          <!-- Photo Preview-->
          <div class="form-group">
            <div class="col-md-12 margin-bottom">
              <div class="well space-top" v-if="file">
                <a :href="file" class="btn btn-info btn-small" target="_blank">
                  Preview
                </a>
                {{filename}}
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
  name: 'attachment-upload',
  props: ['attachment', 'errors'],
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
          this.$emit('attachment-change', res.data.attachment);
          this.form.busy = false;
        })
        .catch(err => {
          this.form.busy = false;
        });
    },
    gatherFormData() {
      const data = new FormData();
      data.append('attachment', this.$refs.attachment.files[0]);
      return data;
    }
  },
  computed: {
    /**
     * Calculate the style attribute for the photo preview.
     */
    previewStyle() {
      return `background-image: url(${this.attachment.fullSize});
          background-size:contain;
          height:150px;
          min-width: 100%;
          background-repeat: no-repeat;`;
    },
    filename() {
      return this.file.split('/').pop();
    },
    file() {
      if (this.attachment.secure_url) {
        return this.attachment.secure_url;
      }
      return null;
    }
  }
};
</script>
