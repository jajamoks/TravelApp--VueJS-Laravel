<template>
  <div class="panel panel-default">
    <div class="panel-heading withButton">
      <button class="btn btn-sm btn-primary pull-right margin-bottom" v-on:click="save">
        Save
      </button>
      <router-link :to="{name: 'upcoming-escapes'}" tag="button" class="btn  btn-sm pull-right margin-bottom btn-danger  pull-right margin-bottom" style="margin-right:10px;" >Cancel</router-link>
      {{form.name}}
    </div>
    <div class="panel-body">
      <div v-if="success" class="alert alert-success" role="alert">
        <strong>Saved!</strong>
      </div>
      <ul class="nav nav-tabs">
        <router-link
          active-class="active"
          tag="li"
          :to="{name:'general-info', params:{id: form.id}}">
          <a>General Info</a>
        </router-link>
        <router-link
          tag="li"
          v-if="form.id"
          active-class="active"
          :to="{name:'photo-gallery', params:{id: form.id}}">
          <a>Photo Gallery</a>
        </router-link>
        <router-link
          tag="li"
          v-if="form.id"
          active-class="active"
          :to="{name:'features', params:{id: form.id}}">
          <a>Features</a>
        </router-link>
        <router-link
          tag="li"
          v-if="form.id"
          active-class="active"
          :to="{name:'itinerary', params:{id: form.id}}">
          <a>Sample Itinerary</a>
        </router-link>
        <router-link
          tag="li"
          v-if="form.id"
          active-class="active"
          :to="{name:'testimonial-select', params:{id: form.id }}">
          <a>Featured Testimonial</a>
        </router-link>
        <router-link
          tag="li"
          v-if="form.id"
          active-class="active"
          :to="{name:'tags', params:{id: form.id }}">
          <a>Tags</a>
        </router-link>
        <router-link
          tag="li"
          v-if="form.id"
          active-class="active"
          :to="{name:'teachers', params:{id: form.id }}">
          <a>Teachers</a>
        </router-link>
      </ul>
      <router-view :form="form" :loaded="hasLoaded"></router-view>
    </div>
  </div>
</template>
<script>
export default {
  name: 'escape-type-form',
  data: () => ({
    form: new Form({
      name: '',
      description: '',
      accomodations: '',
      region: '',
      country: '',
      teachers: [],
      features: [],
      testimonials: [],
      featured_image: '',
      wellness_summary: '',
      home_summary: '',
      unique_summary: '',
      nutrition_summary: '',
      itinerary: '',
      tags: []
    }),
    success: false,
    hasLoaded: false
  }),
  methods: {
    fetchData() {
      const { id } = this.$route.params;
      axios
        .get(`/api/escape_types/${id}`)
        .then(res => {
          res.data.tags = res.data.tags.map(item => item.name);
          this.form = new Form(res.data);
          this.hasLoaded = true;
        })
        .catch(err => {});
    },
    save() {
      if (this.form.id) {
        Form.put(`/api/escape_types/${this.form.id}`, this.form)
          .then(res => {
            this.alertSuccess();
          })
          .catch(err => err);
      } else {
        Form.post(`/api/escape_types`, this.form)
          .then(res => {
            this.alertSuccess();
            this.$router.push({ name: 'escape-builder' });
          })
          .catch(err => console.log(err));
      }
    },
    alertSuccess() {
      this.success = true;
      setTimeout(() => (this.success = false), 1000);
    }
  },
  mounted() {
    this.fetchData();
  }
};
</script>
