<template>
<div>
      <div class="row">
        <list-item
        v-for="item in items.slice(0,3)" :item="item"></list-item>
      </div>
      <div class="row">
        <list-item
        v-for="item in items.slice(3)" :item="item"></list-item>
      </div>
      <section class="text-center">
          <ul class="pagination pagination-lg pagination-border">
              <router-link tag="li" v-for="n in pages" :to="{name: 'press-list', query: {page : n}}">
                  <a>
                    <span>{{ n }}</span>
                  </a>
              </router-link>
          </ul>
      </section>
</div>
</template>
<script>
import ListMixin from '../mixins/list';
import ListItem from './list-item';
export default {
  name: 'list',
  data: () => ({
    resource: '/api/press'
  }),
  mixins: [ListMixin],
  components: {
    ListItem
  }
};
</script>
<style scoped>
.image {
  max-width: 100px;
}
</style>
