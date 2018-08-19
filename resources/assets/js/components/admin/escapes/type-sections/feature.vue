<template>
  <div class="row">
    <div class="col-xs-3 options">
      <div>
        <i class="fa fa-reorder drag-handle"></i>
      </div>
      <div class="menu">
        <button class="btn btn-sm btn-danger" @click="deleteFeature">
          <i class="fa fa-times"></i>
        </button>
        <button class="btn btn-sm btn-primary pull-right" @click="saveFeature">
          Save
        </button>

      </div>
    </div>
    <div class="col-xs-9">
        <textarea rows="5" v-model="feature.content" class="form-control" required></textarea>
    </div>
  </div>
</template>
<script>
export default {
  name: 'feature',
  props: {
    feature: {
      type: Object,
      required: true
    },
    typeId: {
      type: Number,
      required:true
    }
  },
  methods : {
    deleteFeature() {
      axios.delete(
        `/api/escape_types/${this.typeId}/features/${this.feature.id}`
      ).then(res => {
        this.$emit('feature-deleted');
      }).catch(err => {
        console.log(err);
      })
    },
    saveFeature() {
      axios.put(
        `/api/escape_types/${this.typeId}/features`,
        this.feature
      ).then(res => {
        this.$emit('feature-updated');
      })
    }
  }
};
</script>
<style scoped>
.options {
  position: relative;
}
.menu {
  margin-top:60px;
}
</style>
