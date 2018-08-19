<template>
<div>
<user-header />
<div>
  <transition name="fade">
    <router-view></router-view>
  </transition>
</div>
</div>
</template>
<script>
import UserHeader from './user-header.vue';
export default {
  name: 'layout',
  components: {
    UserHeader
  }
};
</script>
