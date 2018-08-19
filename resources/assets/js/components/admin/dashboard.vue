<template>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Activity Feed</h3>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
    <table class="table table-borderless m-b-none">
        <thead>
            <th>Time</th>
            <th>Event</th>
            <th>Description</th>
            <th></th>
        </thead>
        <tbody>
            <tr v-for="item in items">
                <td>
                    {{ toLocalTime(item.created_at) }}
                </td>
                <td>
                    {{ item.event }}
                </td>
                <td>
                  {{item.description}}
                </td>
                <td>
                  <a v-if="item.link" :href="item.link" class="btn btn-info">View</a>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    <section class="text-center">
        <ul class="pagination pagination-lg pagination-border">
          <router-link tag="li"  :to="{name: 'dashboard', query: {page : prevPage}}">
              <a>
                <span>
                  <i class="fa fa-angle-double-left"></i>
                </span>
              </a>
          </router-link>
           <router-link tag="li" :to="{name: 'dashboard', query: {page : nextPage}}">
              <a>
                <span>
                  <i class="fa fa-angle-double-right"></i>
                </span>
              </a>
          </router-link>
        </ul>
    </section>
  </div>
</div>
</div>
</template>
<script>
import ListMixin from './mixins/list';
import moment from 'moment';
export default {
	name: 'dashboard',
	data: () => ({
		resource: '/api/feed',
	}),
	mixins: [ListMixin],
	methods: {
		toLocalTime(value) {
			return moment
				.utc(value)
				.local()
				.format('MM-DD-YY hh:mm:ss a');
		},
	},
	computed: {
		prevPage() {
			var { page } = this.$route.query;
			page = page ? +page : 1;
			if (page > 1) {
				return page - 1;
			}
			return 1;
		},
		nextPage() {
			var { page } = this.$route.query;
			page = page ? +page : 1;
			console.log(this.pages);
			if (page + 1 <= this.pages) {
				return page + 1;
			}
			return this.pages;
		},
	},
};
</script>
