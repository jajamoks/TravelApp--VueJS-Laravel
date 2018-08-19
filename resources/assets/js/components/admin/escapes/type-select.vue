<template>
  <select class="form-control" v-on:change="onChange">
    <option></option>
    <option v-for="type in types" v-bind:value="type.id">
      {{type.name}}
    </option>
  </select>
</template>
<script>
export default {
  name: 'type-select',
  data: () => ({
    types: []
  }),
  methods: {
    fetchTypes() {
      axios.get('/api/escape_types?all=true')
        .then(res => {
          this.types = res.data;
        }).catch(err => {

        })
    },
    onChange(event) {
      var id = event.target.value;
      console.log(id)
      var type = this.types.find(type => +type.id === +id);
      this.$emit('change', type)
    }
  },
  mounted() {
    this.fetchTypes();
  }
};
</script>
