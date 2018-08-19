<template>
<div class="panel panel-default">
    <div class="panel-heading">Category</div>
    <div class="panel-body">
        <select class="form-control" v-model="form.post_category_id">
            <option v-for="category in categories" v-bind:value="category.id">{{ category.title }}</option>
        </select>
    </div>
</div>
</template>
<script>
export default {
  name: 'category-select',
  props: ['form'],
  data() {
    return {
      categories:[]
    }
  },
  methods: {
    getCategories() {
      axios.get('/api/post_categories')
        .then(res => {
          this.categories = res.data;
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
