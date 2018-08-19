<template>
<div>
  <div class="row margin-bottom">
    <div class="col-md-12">
      <h3>Tags</h3>
      <input-tags
      :on-change="onChange"
      :tags="form.tags"
      ></input-tags>
    </div>
  </div>
</div>
</template>
<script>
import InputTags from 'vue-input-tag';
export default {
  name: 'tags',
  components: {
    InputTags
  },
  props: {
    form: {
      type: Object,
      required: true
    }
  },
  methods: {
    onChange(tags) {
      this.form.tags = tags
    }
  }
};
</script>
