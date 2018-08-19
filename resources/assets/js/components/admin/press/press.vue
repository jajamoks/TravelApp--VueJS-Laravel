<template>
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Press
                </div>
                <div class="panel-body">
                    <ul class="nav margin-bottom">
                        <router-link tag="li" class="" :to="{name: 'press-list'}">
                            <a>Press</a>
                        </router-link>
                    </ul>
                    <div class="text-center">
                        <router-link tag="button" :to="{name: 'edit-press', params: {id: 'new'}}"
                                     class="btn btn-primary">
                            New Press
                        </router-link>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'press'
    };
</script>
