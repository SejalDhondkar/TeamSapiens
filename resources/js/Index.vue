<template>
  <v-app>
    <component v-bind:is="layout"></component>
  </v-app>
</template>

<script>
import AppLayout from './layouts/AppLayout'
import AuthLayout from './layouts/AuthLayout'
import UserLayout from './layouts/UserLayout'
import BlankLayout from './layouts/BlankLayout'
export default {
  computed: {
    layout () {
      return this.$store.getters.layout
    }
  },
  components: {
    'app-layout': AppLayout,
    'auth-layout': AuthLayout,
    'user-layout': UserLayout,
    'blank-layout': BlankLayout
    // define as many layouts you want for the application
  }
}
</script>
