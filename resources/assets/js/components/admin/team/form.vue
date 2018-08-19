<template>
<div>
  <router-link :to="{name: 'team'}" class="btn btn-danger margin-bottom">Cancel</router-link>
<div class="row">
  <div class="col-md-6 margin-bottom">
  <div class="panel panel-default">
    <div class="panel-heading">Name</div>
    <div class="panel-body">
    <div class="form-group" :class="{'has-error': form.errors.has('name')}">
      <div class="alert alert-danger" v-show="form.errors.has('name')">
      {{ form.errors.get('name') }}
      </div>
      <input type="text" class="form-control" name="name" v-model="form.name">
    </div>
    </div>
  </div>
  </div>
  <div class="col-md-6 margin-bottom">
  <div class="panel panel-default">
    <div class="panel-heading">Credentials</div>
    <div class="panel-body">
    <div class="form-group" :class="{'has-error': form.errors.has('credentials')}">
      <div class="alert alert-danger" v-show="form.errors.has('credentials')">
      {{ form.errors.get('credentials') }}
      </div>
      <input type="text" class="form-control" name="credentials" v-model="form.credentials">
    </div>
    </div>
  </div>
  </div>
</div>
<!-- Content -->
<div class="row">
  <div class="col-md-6 margin-bottom">
  <div class="panel panel-default">
    <div class="panel-heading">Bio</div>
    <div class="panel-body">
    <div class="form-group" :class="{'has-error': form.errors.has('bio')}">
      <div class="alert alert-danger" v-show="form.errors.has('bio')">
      {{ form.errors.get('bio') }}
      </div>
      <textarea v-model="form.bio" class="form-control" rows="11"></textarea>
    </div>
    </div>
  </div>
  </div>
  <div class="col-md-6">
  <image-upload :form="form" v-on:image-change="onImageChange"></image-upload>
  </div>
</div>
<div class="row">
  <div class="col-md-12 margin-bottom">
  <div class="panel panel-default">
    <div class="panel-heading">Social Media Links</div>
    <div class="panel-body">
    <div class="row">
      <div class="col-md-6">
      <div class="form-group">
        <label><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</label>
        <input v-model="form.twitter_url" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</label>
        <input v-model="form.facebook_url" type="text" class="form-control">
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label><i class="fa fa-google-plus" aria-hidden="true"></i> Google Plus</label>
        <input v-model="form.gplus_url" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label><i class="fa fa-linkedin" aria-hidden="true"></i> Linked In</label>
        <input v-model="form.linkedin_url" type="text" class="form-control">
      </div>
      </div>
    </div>
    </div>
  </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
  <button type="submit"
  class="btn btn-primary"
  @click.prevent="saveData"
  :disabled="form.busy">
  Save
  </button>
  <div class="pull-right" v-if="form.id">
  <button type="submit" class="btn btn-danger"
  @click.prevent="deleteData"
  :disabled="form.busy">
  Delete
  </button>
  </div>
  </div>
</div>
</div>
</template>
<script>
import ImageUpload from './image-upload.vue';
export default {
  name: 'team-form',
  components: {
    ImageUpload
  },
  data: () => ({
  form: new Form({
    name: '',
    bio: '',
    credentials:null,
    twitter_url: '',
    linkedin_url: '',
    facebook_url: '',
    gplus_url: '',
    media: {},
  }),
  formAttrs : {
    name: '',
    bio: '',
    credentials:null,
    twitter_url: '',
    linkedin_url: '',
    facebook_url: '',
    gplus_url: '',
    media: {}
  }
  }),
  methods: {
    saveData(){
      if(this.form.id){
        Form.put(`/api/team/${this.form.id}`, this.form).then(res => {
            this.$router.push({name: 'team'})
          });
        } else {
        Form.post('/api/team', this.form).then(res => {
            this.$router.push({name: 'team'})
        });
      }
    },
    deleteData() {
      if(this.form.id){
        var ack = confirm('Are you sure?');
        if(ack) {
          Form.delete(`/api/team/${this.form.id}`, this.form)
            .then(res => {
              this.$router.push({name: 'team'})
            })
        }
      }
    },
    onImageChange(value){
      this.form.media = value;
    },
    fetchData() {
      const { id } = this.$route.params;
      if(id && id !== 'new') {
        axios.get(`/api/team/${id}`).then(res => {
          this.form = new Form(res.data);
        });
      }
    },
  },
  mounted() {
    this.fetchData();
  }
};
</script>
