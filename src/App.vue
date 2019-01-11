<template>
  <div id="app">
    <app-header></app-header>
    <router-view></router-view>
    <app-footer></app-footer>
  </div>
</template>

<script>
import Header from './components/Header'
import Footer from './components/Footer'
import Carousel from './components/Carousel'

export default {
  name: 'App',
  components: {
      'app-header': Header,
      'app-footer': Footer,
      'app-carousel':Carousel 
  }
}
</script>

<style>
  @import "assets/css/common.css";
  @import "assets/css/mycss.css";
</style>
