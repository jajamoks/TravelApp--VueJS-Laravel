<template>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="/images/logo.jpg" alt="logo"></a>
            </div>
            <div class="navbar-collapse collapse">
                <div class="sign-in">
                    <div class="right">
                        <a href="/logout">
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
                <ul class="nav navbar-nav">
                    <li activeClass="active"><a href="/"><span>HOME</span></a></li>
                    <router-link :to="{ name: 'my-escapes'}" tag="li" activeClass="active">
                        <a href="#"><span>My Escapes</span></a>
                    </router-link>
                    <router-link :to="{ name: 'account-info'}" tag="li" activeClass="active">
                        <a href="#">
                            <div class="pulse-container" v-if="incompleteProfile">
                                <div class="dot"></div>
                                <div class="pulse"></div>
                            </div>
                            <span>Profile</span>
                        </a>
                    </router-link>
                </ul>
            </div>
        </nav>
    </header>
</template>
<script>
    import {UserEvents} from './user-events';

    export default {
        name: 'user-header',
        data: () => ({
            incompleteProfile: false
        }),
        mounted() {
            UserEvents.$on('profile-incomplete', () => {
                this.incompleteProfile = true;
            });
            UserEvents.$on('profile-complete', () => {
                this.incompleteProfile = false;
            });
        }
    };
</script>
