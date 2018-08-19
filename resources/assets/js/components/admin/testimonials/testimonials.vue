<template>
<div>
  <div class="col-md-2">
    <div class="panel panel-default">
      <div class="panel-heading">
        Testimonials
      </div>
      <div class="panel-body">
        <ul class="nav margin-bottom">
          <router-link tag="li" class="" :to="{name: 'testimonials'}">
            <a>Testimonials</a>
          </router-link>
        </ul>
        <div class="text-center">
          <router-link tag="button" :to="{name: 'edit-testimonial', params: {id: 'new'}}" class="btn btn-primary">
            New Testimonial
          </router-link>
        </div>
      </div>
    </div>
  </div>
  <div class='col-md-10'>
    <router-view></router-view>
  </div>
</div>
</template>
<script>
export default {
  name: 'testimonials'
};
</script>
