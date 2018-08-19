<template>
  <div>
    <div class="text-center margin-bottom">
        <router-link :to="{name:'edit-team', params: {id: 'new'}}" class="btn btn-primary">New Team Member</router-link>
    </div>
  <div class="posts-list">

    <table class="table table-borderless m-b-none">
    <thead>
      <th></th>
      <th>Name</th>
      <th>Credentials</th>
      <th>Actions</th>
    </thead>
    <tbody>
      <tr v-for="member in data">
      <td v-if="member.media">
        <img v-bind:src="member.media.secure_url" class="image escape-teacher-image" />
      </td>
      <td v-else>
        <i class="fa fa-user"></i>
      </td>
      <td>
        {{ member.name }}
      </td>
      <td>
        {{ member.credentials }}
      </td>
      <td>
        <router-link
        :to="{ name: 'edit-team', params: { id: member.id }}" class="btn btn-info btn-sm" >Edit</router-link>
      </td>
      </tr>
    </tbody>
    </table>
    <section class="text-center">
    <ul class="pagination pagination-lg pagination-border">
      <router-link tag="li" v-for="n in pages" :to="{name: 'team', query: {page : n}}">
          <a>
            <span>{{ n }}</span>
          </a>
      </router-link>
    </ul>
    </section>
  </div>
  </div>
</template>
<script>
import { find, map } from 'lodash';
import axios from 'axios';
export default {
  data: () => ({
    data: [],
    count: 1,
    perPage: 10
  }),
  methods: {
    getData(page) {
      return axios.get(`/api/team?page=${page}`).then(response => {
        this.data = response.data.data;
        this.count = response.data.total;
        this.perPage = response.data.per_page;
      });
    }
  },
  computed: {
    pages() {
      return Math.ceil(this.count / this.perPage);
    }
  },
  watch: {
    $route: {
      handler: function(val) {
        this.getData(val.query.page);
      }
    }
  },
  mounted() {
    var page = this.$route.query.page ? this.$route.query.page : 1;
    this.getData(page);
  }
};
</script>
<style scoped>
.image {
  max-width: 100px;
}
</style>
