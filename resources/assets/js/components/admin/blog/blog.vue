<template>
  <div class="row">
    <div class="col-md-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          Blog
        </div>
        <div class="panel-body">
          <ul class="nav margin-bottom">
            <router-link tag="li" class="" :to="{name: 'blog-list'}">
              <a>Posts</a>
            </router-link>
            <router-link tag="li" class="" :to="{name: 'post-categories'}">
              <a>Categories</a>
            </router-link>
          </ul>
          <div class="text-center">
            <router-link tag="button" :to="{name: 'edit-post'}" class="btn btn-primary">
              New Post
            </router-link>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-10">
      <router-view></router-view>
    </div>
  </div>
</template>
<script>
export default {
  name: 'blog'
};
</script>
