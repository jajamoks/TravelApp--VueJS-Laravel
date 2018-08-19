<template>
    <div>
        <div class="row">
            <div class="col-md-12 margin-bottom">
                <ul class="nav nav-pills">
                    <li class="active" data-toggle="tab" data-target="#approved" @click.prevent="selectedTab('approved')">
                        <a href="#">Approved<span class="badge">{{approveTestimonialCount}}</span></a>
                    </li>
                    <li data-toggle="tab" data-target="#pending" @click.prevent="selectedTab('pending')">
                        <a href="#">Pending Approval
                            <span class="badge">{{notApproveTestimonialCount}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="approved">
                        <testimonial
                                v-on:testimonial-change="fetchData()"
                                v-for="testimonial in approved" :testimonial="testimonial" >
                        </testimonial>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="pending">
                        <testimonial
                                v-on:testimonial-change="fetchData()"
                                v-for="testimonial in pending" :testimonial="testimonial"
                                >
                        </testimonial>
                    </div>
                </div>
            </div>
        </div>
        <section class="text-center">
            <ul class="pagination pagination-lg pagination-border">
                <router-link tag="li" v-for="n in pages" :to="{name: 'testimonials', query: {page : n, status: status}}">
                    <a>
                        <span>{{ n }}</span>
                    </a>
                </router-link>
            </ul>
        </section>
    </div>
</template>
<script>

    import testimonial from './testimonial';
    export default {
        name: 'testimonials',
        components: {
            testimonial
        },
        data: () => ({
            currentPage: 3,
            testimonials: [],
            items: [],
            count: 0,
            perPage: 10,
            approveTestimonialCount : 0,
            notApproveTestimonialCount : 0,
            status:1
        }),
        methods: {
            fetchData() {
                axios
                    .get(`/api/testimonials?page=1&status=1`)
                    .then(res => {
                         console.log(res.data);
                        this.testimonials = res.data.testimonial.data;
                        this.count = res.data.count;
                        this.perPage = res.data.perPage;
                        this.approveTestimonialCount = res.data.approveTestimonialCount;
                        this.notApproveTestimonialCount = res.data.notApproveTestimonialCount;
                    })
                    .catch(err => console.log(err));
            },
            getPostsByPage(page,status) {
                axios.get(`/api/testimonials?page=${page}&status=${status}`)
                    .then(response => {
                        this.testimonials = response.data.testimonial.data;
                        this.count = response.data.count;
                        this.perPage = response.data.perPage;
                        this.approveTestimonialCount = response.data.approveTestimonialCount;
                        this.notApproveTestimonialCount = response.data.notApproveTestimonialCount;
                    });
            },
            selectedTab(tab){
                if (tab == 'approved'){
                    this.$router.push('/testimonials/?page=1&status=1')
                    this.status = 1;
                } else if (tab == 'pending'){
                    this.$router.push('/testimonials/?page=1&status=2')
                    this.status = 2;
                }
            }
        },
        computed: {
             approved() {
                 return this.testimonials;
             },
             pending() {
                 return this.testimonials;
             },
            pages() {
                return Math.ceil(this.count/ this.perPage);
            },

        },
        watch: {
            $route : {
                handler: function(val) {
                    this.getPostsByPage(val.query.page,val.query.status)
                }
            }
        },
        mounted() {
            this.fetchData();
            var page = this.$route.query.page ? this.$route.query.page : 1;
            this.getPostsByPage(page);
        }
    };
</script>
