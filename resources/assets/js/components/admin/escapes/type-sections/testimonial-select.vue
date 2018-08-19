<template>
  <div>
    <h3>Featured Testimonial</h3>
    <ul class="testimonial-select-list">
      <li v-for="testimonial in testimonials">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">
              <span class="label label-info name">
                {{testimonial.name}}
              </span>
              <span class="label label-success date">
                {{testimonial.display_date}}
              </span>
            </h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2 action">
                <button class="btn btn-primary" v-if="currentTestimonial.id != testimonial.id"
                @click="makeFeatured(testimonial)">
                  Select
                </button>
                <i v-else class="fa fa-check-square-o"></i>
              </div>
              <div class="col-md-10">
                {{testimonial.content}}
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>
<script>
import Testimonial from '../../testimonials/testimonial.vue';
import { first } from 'lodash';
import axios from 'axios';
export default {
  name: 'testimonial-select',
  data: () => ({
    testimonials: []
  }),
  components: {
    Testimonial
  },
  props: ['form'],
  methods: {
    fetchData() {
      const { id } = this.$route.params;
      axios.get('/api/testimonials').then(res => {
        this.testimonials = res.data.filter(test => {
          return test.approved;
        });
      });
    },
    makeFeatured(testimonial) {
      axios
        .put(`/api/escape_types/${this.form.id}/testimonials`, testimonial)
        .then(res => {
          this.form.escape_testimonials = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  computed: {
    currentTestimonial() {
      const testimonials = this.form.escape_testimonials;
      return testimonials ? testimonials : {};
    }
  },
  mounted() {
    this.fetchData();
  }
};
</script>
<style scoped>
.testimonial-select-list {
  list-style: none;
  max-height: 400px;
  overflow-y: scroll;
}
.date {
  margin-left: 10px;
}
.action {
  font-size: 60px;
  text-align: center;
  color: #5cb85c;
}

</style>
