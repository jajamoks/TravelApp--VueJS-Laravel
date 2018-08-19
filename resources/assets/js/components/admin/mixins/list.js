import axios from 'axios';

export default {
    data: () => ({
        items: [],
        count: 0,
        perPage: 12
    }),
    methods: {
        getByPage(page) {
            axios.get(`${this.resource}?page=${page}${this.query}`).then(response => {
                this.items = response.data.data;
                this.count = response.data.total;
                this.perPage = response.data.per_page;
            });
        }
    },
    computed: {
        pages() {
            return Math.ceil(this.count / this.perPage);
        },
        query() {
            return this.queryString ? this.queryString : '';
        }
    },
    watch: {
        $route: {
            handler: function (val) {
                this.getByPage(val.query.page);
            }
        }
    },
    mounted() {
        var page = this.$route.query.page ? this.$route.query.page : 1;
        this.getByPage(page);
    }
};
