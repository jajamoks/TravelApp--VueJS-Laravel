<template>
  <div>
  <h3>Features</h3>
  <div class="row">
    <div class="col-md-6">
        <draggable :list="features" @start="drag=true" @end="drag=false" @change="onReorder" element="ul" class="list-group" :options="{handle:'.drag-handle'}">
        <li v-for="feature in features" class="list-group-item">
          <feature :feature="feature" :typeId="form.id" v-on:feature-deleted="fetchData"></feature>
        </li>
      </draggable>
    </div>
    <div class="col-md-6">
        <p v-if="errors.length">
            <div class="alert alert-danger " role="alert" v-for="error in errors">
      {{ error }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  

      
</p>

        <textarea class="form-control margin-bottom" rows="5" v-model="content" ></textarea>
        <button class="btn btn-primary pull-right" type="button" name="button"
        @click="saveData">
          <i class="fa fa-plus"></i> Add Feature
        </button>
    </div>
  </div>
  </div>
</template>
<script>
import draggable from 'vuedraggable';
import feature from './feature.vue';
export default {
  name: 'features',
  components: {
    draggable,
    feature
  },
  props: {
    form: {
      type: Object,
      required: true
    }
  },
  data: () => ({
    features: [],
    errors:[],
    content:''
  }),
  methods: {
    fetchData() {
      axios.get(`/api/escape_types/${this.form.id}/features`)
        .then(res => {
          this.features = res.data
        }).catch(err => {

        });
    },
    saveData() {
      var { content } = this;
      var data = {
        content,
        order : this.features.length + 1
      }
      console.log(data);
      if(!content) {
          this.errors.push("Feature content is required.");
      }else{
        this.errors.pop();
      }
      axios.post(`/api/escape_types/${this.form.id}/features`, data)
        .then(res => {
          this.features = res.data;
          this.content = '';
        }).catch(err => {
           console.log(error);
        });
    },
    onReorder() {
      let list = this.features.map((item,index) => {
          item.order = index + 1;
          return item;
      })
      this.features = list;
      this.saveReorder(this.features);
    },
    saveReorder() {
      axios.put(`/api/escape_types/${this.form.id}/features`, this.features)
        .then(res => {
          this.features = res.data;
        }).catch(err => {
          console.log(err);
        })
    }
  },
  watch: {
    ['form.id'] : function() {
      this.fetchData();
    }
  },
  mounted() {
    this.fetchData();
  }
};
</script>
<style scoped>
textarea {
  width: 100%;
}
</style>
