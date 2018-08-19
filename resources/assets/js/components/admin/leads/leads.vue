<style>
td, th {
    padding: 8px;
}
@media only screen and (max-width: 600px) {

.pagination-lg > li > a, .pagination-lg > li > span{padding:4px 11px; font-size:14px;}

}

</style>
<template>
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="table-responsive">
      <table class="table table-borderless m-b-none">
          <thead>
              <th>Name</th>
              <th>Interest</th>
              <th>Contact</th>
              <th>Zip</th>
              <th>Date</th>
              <th>Actions</th>
          </thead>
          <tbody>
              <tr v-for="lead in leads">
                  <td>
                      {{ lead.name }}
                  </td>
                  <td>
                      <span v-if="lead.interest" class="label label-success">
                          {{ lead.interest }}
                      </span>
                      <span v-else class="label label-warning">Not Specified</span>
                  </td>
                  <td>
                      <div>{{ lead.email }}</div>
                      <div>{{ lead.phone }}</div>
                  </td>
                  <td>
                      <div>{{ lead.zip }}</div>
                  </td>
                  <td>
                      {{ lead.created_at }}
                  </td>
                  <td>
                       <button type="button" class="btn btn-info btn-sm" data-toggle="modal" v-bind:data-target="'#message-' + lead.id"
                       >View Message</button>
                       <div class="modal fade" v-bind:id="'message-' + lead.id" tabindex="-1" role="dialog">
                           <div class="modal-dialog">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                       <h4 class="modal-title">
                                           {{ lead.name }}
                                       </h4>
                                   </div>
                                  <div class="modal-body" style="white-space: pre-line;">
                                       <p>{{ lead.message }}</p>
                                  </div>
                               </div>
                           </div>
                       </div>
                  </td>
              </tr>
          </tbody>
      </table>
      </div>
      <section class="text-center">
          <ul class="pagination pagination-lg pagination-border">
            <router-link tag="li" v-for="n in pages" :to="{name: 'leads', query: {page : n}}">
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
export default {
  data() {
    return {
      leads: [],
      count: 1,
      perPage: 10
    };
  },
  methods: {
    getData() {
      return axios.get('/api/leads').then(response => {
        this.leads = response.data.data;
        this.count = response.data.total;
        this.perPage = response.data.per_page;
      });
    },
    getDataByPage(page) {
      return axios.get(`/api/leads/?page=${page}`).then(response => {
        this.leads = response.data.data;
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
        this.getDataByPage(val.query.page);
      }
    }
  },
  mounted() {
    var page = this.$route.query.page ? this.$route.query.page : 1;
    this.getDataByPage(page);
  }
};
</script>
