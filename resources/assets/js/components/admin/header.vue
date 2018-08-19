<template>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          E2S Dashboard
        </a>
      </div>
      <div class="navbar-collapse collapse" >
        <ul class="nav navbar-nav">
          <router-link tag="li" :to="{name: 'upcoming-escapes'}" onclick="closeNav()">
            <a>Escapes</a>
          </router-link>
          <router-link tag="li" :to="{name: 'blog-list'}" onclick="closeNav()">
            <a>Blog</a>
          </router-link>
          <router-link tag="li" :to="{name: 'leads'}" onclick="closeNav()">
            <a>Leads</a>
          </router-link>
          <router-link tag="li" :to="{name: 'team'}" onclick="closeNav()">
            <a>Team</a>
          </router-link>
          <router-link tag="li" :to="{name: 'testimonials'}" onclick="closeNav()">
            <a>Testimonials</a>
          </router-link>
          <router-link tag="li" :to="{name: 'press-list'}" onclick="closeNav()">
            <a>Press</a>
          </router-link>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="logout" onclick="closeNav()">
            <a href="/logout">
              <span>Logout <i class="fa fa-sign-out"></i></span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
</template>
<script>
module.exports = {
  name: 'e2s-header'
};
</script>



