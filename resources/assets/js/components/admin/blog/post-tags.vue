<template>
<div>
    <div class="panel panel-default">
        <div class="panel-heading">Tags</div>
        <div class="panel-body">
            <input-tag
            :on-change="onChange"
            :tags="form.tags"

            ></input-tag>
            <p>* Press Enter After Adding Each Tag</p>
        </div>
    </div>
</div>
</template>
<script>
import InputTag from 'vue-input-tag';
export default {
  name: 'post-tags',
  components: {
    InputTag
  },
  props: {
    form: {
      type: Object,
      required: true
    }
  },
  methods: {
    onChange(tags) {
      this.form.tags = tags;
    }
  }
};
</script>
