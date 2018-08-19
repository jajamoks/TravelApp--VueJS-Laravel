<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            {{escape.escape_type.name}}
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <i class="fa fa-calendar"></i> {{formatDate(escape.start_date)}} - {{formatDate(escape.end_date)}}
                </div>
                <div class="col-md-12 space-bottom">
                    {{escape.escape_type.location}}
                </div>
            </div>
            <div class="row space-top">
                <div class="col-md-12">
                    <router-link class="btn btn-primary" :to="{name: 'reservations', params: {id: escape.id}}">
                        Manage
                    </router-link>
                    <button class="btn btn-danger pull-right" @click="deleteUpcommingEscapes(escape.id)">Delete</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import moment from 'moment';
    import swal from 'sweetalert2';

    export default {
        name: 'escape-list-item',
        props: {
            escape: {
                type: Object,
                required: true
            }
        },
        methods: {
            formatDate(date) {
                return moment(date).format('MMMM Do, YYYY');
            },

            deleteUpcommingEscapes(escapeId) {
                swal({
                    title: 'You want to delete this upcomming escapes?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete(`/api/escapes/${escapeId}`).then(response => {
                            if ( response.status == 200 ) {
                                window.location.reload();
                            }
                        }).catch(e => {
                            this.errors.push(e)
                        })
                    }
                })
            }
        }
    };
</script>
