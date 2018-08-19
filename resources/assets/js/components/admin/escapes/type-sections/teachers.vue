<template>
<div>
  <h3>Teachers</h3>
  <div class="row">
    <div class="col-md-8">
        <draggable :list="form.teachers" @change="onReorder" element="ul" class="list-group" :options="{handle: '.fa-bars'}" @start="drag=true" @end="drag=false">
            <li class="list-group-item" v-for="(item, index) in form.teachers">
              <i class="fa fa-bars"></i>
              {{item.name}}
              <button class="btn btn-sm btn-danger pull-right remove-btn"  @click="removeTeacher(item.id)">
                <i class="fa fa-remove"></i>
              </button>
            </li>
        </draggable>
    </div>
    <div class="col-md-4">
      <select name="teachers" class="form-control" ref="teacherSelect">
        <option v-for="teacher in availableTeachers" :value="teacher.id">
          {{teacher.name}}
        </option>
      </select>
      <button class="btn btn-primary" @click="addTeacher">
        Add
      </button>
    </div>
  </div>
</div>
</template>
<script>
import draggable from 'vuedraggable';
import { sortBy, map, reject, includes, clone } from 'lodash';
export default {
  name: 'teachers',
  data: () => ({
    available: []
  }),
  components: {
    draggable
  },
  props: {
    form: {
      type: Object,
      required: true
    }
  },
  methods: {
    fetchData() {
      axios.get('/api/team?all=true').then(res => {
        this.available = res.data;
      });
    },
    onReorder() {
      let list = this.form.teachers.map((item, index) => {
        if (item.pivot) {
          item.pivot.order = index + 1;
        } else {
          item.order = index + 1;
        }
        return item;
      });
      this.form.teachers = list;
      axios
        .put(`/api/escape_types/${this.form.id}/teachers`, list)
        .then(res => {
          this.form.teachers = res.data;
        });
    },
    removeTeacher(id) {
      axios
        .delete(`/api/escape_types/${this.form.id}/teachers/${id}`)
        .then(res => {
          this.form.teachers = res.data;
        });
    },
    addTeacher() {
      const teacher = {
        id: this.$refs.teacherSelect.value,
        order: this.form.teachers.length + 1
      };
      axios
        .post(`/api/escape_types/${this.form.id}/teachers`, teacher)
        .then(res => {
          this.form.teachers = res.data;
        });
    }
  },
  computed: {
    orderedTeachers() {
      return sortBy(this.form.teachers, teacher => {
        return teacher.pivot.order;
      }).map(item => clone(item));
    },
    availableTeachers() {
      const ids = map(this.form.teachers, 'id');
      return reject(this.available, teacher => {
        return includes(ids, teacher.id);
      });
    }
  },
  mounted() {
    this.fetchData();
  }
};
</script>
<style scoped>
.remove-btn {
  margin-top: -5px;
}
</style>
