<template>
  <v-app>
    <component v-bind:is="layout"></component>
  </v-app>
</template>

<script>
import AppLayout from './layouts/AppLayout'
import AuthLayout from './layouts/AuthLayout'
export default {
  computed: {
    layout () {
      return this.$store.getters.layout
    }
  },
  components: {
    'app-layout': AppLayout,
    'auth-layout': AuthLayout
    // define as many layouts you want for the application
  }
}
</script>
