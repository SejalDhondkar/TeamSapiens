<template>
  <div class="container">
    <div class="card card-default">
      <!-- User Registration Page -->
      <div class="card-header">Register as Hospital</div>

      <div class="card-body">
        <div class="alert alert-danger" v-if="has_error && !success">
          <p v-if="error == 'registration_validation_error'">Erreur(s) de validation, veuillez consulter le(s) message(s) ci-dessous.</p>
          <p v-else>Erreur, impossible de s'inscrire pour le moment. Si le problème persiste, veuillez contacter un administrateur.</p>
        </div>

        <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" v-model="name" required>
          </div>

          <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
            <label for="email">E-mail</label>
            <input type="email" id="email" class="form-control" v-model="email" required>
            <span class="help-block" v-if="has_error && errors.email">{{ errors.email }}</span>
          </div>

          <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" v-model="password">
            <span class="help-block" v-if="has_error && errors.password">{{ errors.password }}</span>
          </div>

          <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" class="form-control" v-model="password_confirmation">
          </div>

          <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        has_error: false,
        error: '',
        errors: {},
        success: false,
        role_id: 2,
      }
    },
    created(){
      // Set layout of page as auth-layout
      this.$store.commit('SET_LAYOUT', 'auth-layout')
    },

    methods: {
      register() {
        var app = this
        this.$auth.register({
          data: {
            name: app.name,
            email: app.email,
            password: app.password,
            password_confirmation: app.password_confirmation,
            role_id: app.role_id,
          },
          success: function () {
            app.success = true
            this.$router.push({name: 'dashboard', params: {successRegistrationRedirect: true}})
          },
          error: function (res) {
            console.log("Error")
            console.log(res.response.data.errors)
            app.has_error = true
            app.error = res.response.data.error
            app.errors = res.response.data.errors || {}
          }
        })
      }
    }
  }
</script>
