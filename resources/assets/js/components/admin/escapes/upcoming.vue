<template>
<div>
  <div class="row">
    <div class="col-md-12">
      <h3>Upcoming Escapes</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4" v-for="escape in items.slice(0,3)">
      <escape-list-item :escape="escape" />
    </div>
  </div>
  <div class="row">
    <div class="col-md-4" v-for="escape in items.slice(3,6)">
      <escape-list-item :escape="escape" />
    </div>
  </div>
  <div class="row">
    <div class="col-md-4" v-for="escape in items.slice(6)">
      <escape-list-item :escape="escape" />
    </div>
  </div>
  <section class="text-center">
      <ul class="pagination pagination-lg pagination-border">
        <router-link tag="li" v-for="n in pages" :to="{name: 'upcoming-escapes', query: {page : n}}">
            <a>
              <span>{{ n }}</span>
            </a>
        </router-link>
      </ul>
  </section>
</div>
</template>
<script>
import moment from 'moment';
import EscapeListItem from './escape-list-item.vue';
import ListMixin from '../mixins/list';
export default {
  name: 'upcoming',
  mixins: [ListMixin],
  data: () => ({
    resource: '/api/escapes',
    queryString: '&filter=upcoming',
    escapes: []
  }),
  components: {
    EscapeListItem
  }
};
</script>
