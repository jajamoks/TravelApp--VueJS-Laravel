<template>
<div>
  <e2s-header></e2s-header>
  <div class="container-fluid main-content">
    <div class="margin-top">
       <router-view></router-view>
    </div>
  </div>
</div>
</template>
<script>
import E2sHeader from './header.vue';
export default {
  name: 'admin',
  components: {
    E2sHeader
  }
};
</script>
