<template>
  <div class="container">
    <div class="card card-default">
      <div class="card-header">Login</div>

      <div class="card-body">
        <div class="alert alert-danger" v-if="has_error">
          <p>Error, could not connect you to website.</p>
        </div>
        <form autocomplete="off" @submit.prevent="login" method="post">
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" v-model="password" required>
          </div>
          <button type="submit" class="btn">Login</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        email: null,
        password: null,
        has_error: false
      }
    },
    created(){
      this.$store.commit('SET_LAYOUT', 'auth-layout')
    },

    mounted() {
      //
    },

    methods: {
      login() {
        // get the redirect object
        var redirect = this.$auth.redirect()
        var app = this
        this.$auth.login({
          params: {
            email: app.email,
            password: app.password
          },
          success: function() {
            // handle redirection
            if(this.$auth.user().role_id === 1)
            {
              this.$router.push({path: '/admin/dashboard'});
            }
            if(this.$auth.user().role_id === 2)
            {
              this.$router.push({path:'/dashboard'});
            }
          },
          error: function() {
            app.has_error = true
          },
          rememberMe: true,
          fetchUser: true
        })
      }
    }
  }
</script>

<style scoped>
.btn {
  background-color: teal;
  color: white;
}
</style>
