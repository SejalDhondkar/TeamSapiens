<template>
  <div>
    <div class="alert alert-danger" v-if="has_error">
      <p>Error, unable to connect to server. Please contact administrator</p>
    </div>

    <table class="table">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Date</th>
      </tr>
      <tr v-for="user in users" v-bind:key="user.id" style="margin-bottom: 5px;">
        <th scope="row">{{ user.id }}</th>
        <td>{{ user.name }}</td>
        <td>{{ user.email }}</td>
        <td>{{ user.created_at}}</td>

      </tr>
    </table>

  </div>
</template>

<script>
  export default {
    data() {
      return {
        has_error: false,
        users: null
      }
    },

    mounted() {
      this.getUsers()
    },

    methods: {
      getUsers() {
        this.$http({
          url: `users`,
          method: 'GET'
        })
          .then((res) => {
            this.users = res.data
          }, () => {
            this.has_error = true
          })
      }
    }
  }
</script>