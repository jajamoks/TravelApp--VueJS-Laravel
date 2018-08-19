<template>
<div>
<div class="row">
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Name</h3>
      </div>
      <div class="panel-body">
        <input type="text" name="name" class="form-control" v-model="form.name" />
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Date</h3>
      </div>
      <div class="panel-body">
        <div class="alert alert-danger" v-show="form.errors.has('date')">
            {{ form.errors.get('date') }}
        </div>
        <datepicker
        input-class="form-control"
        :value="form.date"
        v-on:selected="setPostDate"
        format="MMM dd, yyyy"></datepicker>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Approve</h3>
      </div>
      <div class="panel-body">
        <label>
          <input type="checkbox" @change="approvalChange" :checked="form.approved"/> Approved
        </label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Testimonial</h3>
    </div>
    <div class="panel-body">
      <div class="alert alert-danger" v-show="form.errors.has('content')">
          {{ form.errors.get('content') }}
      </div>
      <textarea class="form-control" v-model="form.content" rows="10">

      </textarea>
    </div>
  </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <button class="btn btn-primary" @click="saveData">
      Save
    </button>
  </div>
</div>
</div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
import TinyMce from 'tinymce-vue-2';
import moment from 'moment';
import { tinymceOptions } from '../../../forms/tinymce';
export default {
  name: 'testimonial-form',
  components: {
    Datepicker,
    TinyMce
  },
  data: () => ({
    form: new Form({
      name: '',
      content: '',
      date: null,
      approved: 0
    }),
    tinymceOptions
  }),
  methods: {
    fetchData() {
      const { id } = this.$route.params;
      if (id !== 'new') {
        axios.get(`/api/testimonials/${id}`).then(res => {
          this.form = new Form(res.data);
        });
      }
    },
    saveData() {
      if (!this.form.id) {
        Form.post(`/api/testimonials`, this.form).then(() => {
          this.$router.push({ name: 'testimonials' });
        });
      } else {
        Form.put(`/api/testimonials/${this.form.id}`, this.form).then(() => {
          this.$router.push({ name: 'testimonials' });
        });
      }
    },
    approvalChange(e) {
      this.form.approved = e.target.checked;
    },
    setPostDate(date) {
      this.form.date = moment(date).format('YYYY-MM-DD HH:MM:SS');
    },
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
  },
  mounted() {
    this.fetchData();
  }
};
</script>
