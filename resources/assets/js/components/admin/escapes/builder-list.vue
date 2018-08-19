<template>
<div>
  <div class="row">
    <div class="col-md-12 margin-bottom text-center">
      <router-link :to="{name: 'general-info'}"
      class="btn btn-primary">Create New Escape</router-link>
    </div>
  </div>
  <div class="row">
    <list-item
    v-for="type in types.slice(0,3)"
    :key="type.id"
    :type="type"></list-item>
  </div>
  <div class="row">
    <list-item
    v-for="type in types.slice(3)"
    :key="type.id"
    :type="type"></list-item>
  </div>
  <section class="text-center">
      <ul class="pagination pagination-lg pagination-border">
          <router-link tag="li" v-for="n in pages" :to="{name: 'escape-builder', query: {page : n}}" :key="n">
              <a>
                <span>{{ n }}</span>
              </a>
          </router-link>
      </ul>
  </section>
</div>
</template>
<script>
import ListItem from './list-item.vue';
export default {
	name: 'builder-list',
	data: () => ({
		types: [],
		count: 1,
		perPage: 6,
	}),
	components: {
		ListItem,
	},
	methods: {
		fetchData(page) {
			axios
				.get(`/api/escape_types?page=${page}`)
				.then(res => {
					this.types = res.data.data;
					this.perPage = res.data.per_page;
					this.count = res.data.total;
				})
				.catch(err => {});
		},
	},
	computed: {
		pages() {
			return Math.ceil(this.count / this.perPage);
		},
	},
	watch: {
		$route: {
			handler: function(val) {
				this.fetchData(val.query.page);
			},
		},
	},
	mounted() {
		const { page } = this.$route.query;
		this.fetchData(page || 1);
	},
};
</script>
