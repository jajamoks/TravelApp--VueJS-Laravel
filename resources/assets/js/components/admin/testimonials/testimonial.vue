<template>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
      {{testimonial.name}}
    </h3>
    <span class="pull-right">
      {{testimonial.display_date}}
    </span>
  </div>
  <div class="panel-body">
    {{testimonial.content}}
  </div>
  <div class="panel-footer">
    <label>
      <input type="checkbox" @change="approvalChange" :checked="testimonial.approved" /> Approved
    </label>
    <router-link :to="{name: 'edit-testimonial', params: {id: testimonial.id}}" class="btn btn-small btn-info pull-right">
    <i class="fa fa-edit"></i>&nbsp;Edit</router-link>
  </div>
</div>
</template>
<script>
export default {
  name: 'testimonial',
  props: {
    testimonial: {
      type: Object,
      required: true
    }
  },
  methods: {
    approvalChange(e) {
      const { id } = this.testimonial;
      axios
        .put(`/api/testimonials/${id}`, {
          id: id,
          approved: e.target.checked
        })
        .then(res => {
          this.$emit('testimonial-change');
        })
        .catch(err => console.log(err));
    }
  }
};
</script>
<style scoped>
.panel-title {
  display: inline-block;
}
</style>
