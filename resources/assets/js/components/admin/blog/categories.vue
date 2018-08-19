<template>
<div>
  <div class="row margin-bottom">
    <div class="col-md-5">
      <div class="input-group">
         <input type="text" class="form-control" v-model="form.title" />
         <span class="input-group-btn">
           <button class="btn btn-primary" v-on:click="addCategory">
             Add Category
           </button>
         </span>
      </div>
    </div>
    <div class="col-md-7">
      <div v-if="errors" class="alert alert-danger">
        Category Title already exists
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 margin-bottom" v-for="category in categories">
      <div class="input-group">
        <input type="text" class="form-control" v-model="category.title" />
        <span class="input-group-btn">
          <button class="btn btn-default" v-on:click="saveCategory(category)">
            Save
          </button>
        </span>
      </div>
    </div>
  </div>
</div>
</template>
<script>
export default {
  name: 'post-categories',
  data: () => ({
    categories: [],
    errors: false,
    form: new Form({
      title: ''
    })
  }),
  methods: {
    getData() {
      axios.get('/api/post_categories').then(res => {
        this.categories = res.data;
      })
    },
    addCategory() {
      this.errors = false;
      if(this.form.title.length) {
        axios.post('/api/post_categories', this.form).then(res => {
          this.categories = res.data;
          this.form = new Form({
            title: ''
          })
        }).catch(err => {
          this.errors = true;
        })
      }

    },
    saveCategory(value) {
      this.errors = false;
      axios.put(`/api/post_categories/${value.id}`, value)
        .then(res => {
          this.categories = res.data;
        }).catch(err => {
          this.errors = true;
        })
    }
  },
  mounted() {
    this.getData();
  }
};
</script>
