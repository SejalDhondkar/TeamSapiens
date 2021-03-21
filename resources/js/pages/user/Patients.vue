<template>
  <div>
    <div class="alert alert-danger" v-if="has_error">
      <p>Error, unable to connect to server. Please contact administrator</p>
    </div>

    <table class="table">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Contact</th>
        <th scope="col">Age</th>
        <th scope="col">Address</th>
        <th scope="col">Diabetes?</th>
        <th scope="col">Pulse?</th>
        <th scope="col">Covid?</th>
        <th scope="col">Date</th>
      </tr>
      <tr v-for="user in users" v-bind:key="user.id" style="margin-bottom: 5px;">
        <th scope="row">{{ user.id }}</th>
        <td>{{ user.name }}</td>
        <td>{{ user.contact }}</td>
        <td>{{ user.age }}</td>
        <td>{{ user.addr }}</td>
        <td>{{ user.diabetes }}</td>
        <td>{{ user.pulse }}</td>
        <td>{{ user.covid }}</td>
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
        users: []
      }
    },

    // mounted() {
    //   this.getUsers()
    // },

    created() {
        this.$store.commit('SET_LAYOUT', 'user-layout');
        this.$http({
          url: `hospital/patients/list`,
          method: 'GET'
        })
          .then((res) => {
            this.users = res.data;
            console.log(this.users);
          }, () => {
            this.has_error = true
          })
        
      },

    methods: {
      // getUsers() {
      //   this.$http({
      //     url: `hospital/patients/list`,
      //     method: 'GET'
      //   })
      //     .then((res) => {
      //       this.users = res.data;
      //       console.log(this.users);
      //     }, () => {
      //       this.has_error = true
      //     })
      // }
    }
  }
</script>