<template>
<div class="panel panel-default">
    <div class="panel-heading">Author</div>
    <div class="panel-body">
        <select class="form-control" v-model="form.user_id">
            <option v-for="author in authors" v-bind:value="author.id">{{ author.name }}</option>
        </select>
    </div>
</div>
</template>
<script>
export default {
  name: 'author-select',
  props: ['form'],
  data() {
    return {
      authors:[]
    }
  },
  methods: {
    getCategories() {
      axios.get('/api/post_authors')
        .then(res => {
          this.authors = res.data;
        }).catch(err => {
          console.log(err);
        });
    }
  },
  mounted() {
    this.getCategories();
  }
};
</script>
