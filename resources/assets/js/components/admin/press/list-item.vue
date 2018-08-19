<template>
  <div class="col-md-4">
    <div class="item-container" :style="background">
      <div class="menu">
        {{item.title}}
        <router-link
          class="btn btn-info pull-right"
          :to="{ name: 'edit-press', params: { id: item.id }}">
            Edit
        </router-link>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'list-item',
  props: {
    item: {
      item: Object,
      required: true
    }
  },
  computed: {
    background() {
      if (this.item.image) {
        return `background-image: url(${this.item.image.fullSize});
            background-size:cover;
            height:150px;
            min-width: 100%;
            background-repeat: no-repeat;`;
      } else {
        return `background: #eee;`;
      }
    }
  }
};
</script>
<style scoped>
.item-container {
  position: relative;
  min-height: 200px;
}
.menu {
  position: absolute;
  bottom:0;
  margin-left: 0;
  margin-right: 0;
  background: rgba(0,0,0,.2);
  width: 100%;
  color: #fff;
  padding: 5px;
}
</style>
