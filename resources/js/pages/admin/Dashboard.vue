<template>
  <div class="container">
    <div class="card card-default">
      <div class="card-header">Admin Dashboard</div>

      <div class="card-body">
        Welcome, this is admin dashboard
      </div>

    </div>
    <br><br>
    <div class="card card-default">
      <div class="card-header">List of Users</div>

      <div class="card-body">
        <userList></userList>
      </div>
    </div>
  </div>
</template>

<script>
  import userList from '../../components/user-list.vue'
  export default {
    mounted() {
      //
    },
    created(){
      this.$store.commit('SET_LAYOUT', 'app-layout')
    },

    components: {
      userList
    }
  }
</script>