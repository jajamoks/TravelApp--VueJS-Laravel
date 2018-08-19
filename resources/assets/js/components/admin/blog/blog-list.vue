<template>
  <div>
      <div class="posts-list">
          <table class="table table-borderless m-b-none">
              <thead>
                <th></th>
                <th>Title</th>
                <th>Published</th>
                <th>Actions</th>
              </thead>
              <tbody>
                  <tr v-for="post in posts">
                      <td>
                          <img v-bind:src="post.featured_image" class="img-responsive image" />
                      </td>
                      <td>
                          {{ post.title }}
                      </td>
                      <td>
                          <span v-if="post.published_date">
                              {{ post.published_date }}
                          </span>
                          <span v-else class="label label-warning">DRAFT</span>
                      </td>
                      <td>
                        <router-link
                        :to="{ name: 'edit-post', params: { id: post.id }}" class="btn btn-info btn-sm" >Edit</router-link>
                        <button class="btn btn-danger btn-sm" @click="deleteBlog(post.id)">Delete</button>
                      </td>
                  </tr>
              </tbody>
          </table>
          <section class="text-center">
              <ul class="pagination pagination-lg pagination-border">
                  <router-link tag="li" v-for="n in pages" :to="{name: 'blog-list', query: {page : n}}">
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
import swal from 'sweetalert2';

export default {
  name: 'blog-list',
  data: () => ({
    posts: [],
    count: 1,
    perPage: 10,
  }),
  methods : {
    getPosts() {
      return axios.get('/api/posts')
        .then(response => {
          this.posts = map(response.data.posts, post => {
            post.tags = map(post.tags, tag => tag.name);
            return post;
          });
          this.count = response.data.count;
          this.perPage = response.data.perPage;
        });
    },
    getPostsByPage(page) {
      axios.get(`/api/posts?page=${page}`)
        .then(response => {
          this.posts = response.data.posts;
          this.count = response.data.count;
          this.perPage = response.data.perPage;
        });
    },
    deleteBlog(blogId) {
      swal({
          title: 'Are you sure you want to delete this blog ?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.value) {
              axios.delete(`/api/posts/${blogId}/delete`).then(response => {
                  if(!!this.$route.query.page) {
                      this.getPostsByPage(this.$route.query.page);
                  } else {
                      this.getPosts();
                  }
              }).catch(e => {
                  this.errors.push(e)
              })
          }
      })
    }
  },
  computed: {
     pages() {
       return Math.ceil(this.count / this.perPage);
     },
  },
  watch: {
    $route : {
      handler: function(val) {
        this.getPostsByPage(val.query.page)
      }
    }
  },
  mounted() {
    var page = this.$route.query.page ? this.$route.query.page : 1;
    this.getPostsByPage(page);
  },
};
</script>
<style scoped>
.image {
  max-width: 100px;
}
</style>
