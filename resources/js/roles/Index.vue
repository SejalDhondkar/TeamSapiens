<template>
  <v-container fluid fill-height>
    <v-layout align-center justify-center>
      <v-data-table
        :headers="headers"
        :items="roles"
        class="elevation-1"
      ></v-data-table>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      headers: [
        {
          text: 'ID',
          align: 'start',
          sortable: true,
          value: 'id',
        },
        { text: 'Title', value: 'title' },
        { text: 'Description', value: 'description' },

      ],
      roles: []
    }
  },
  created(){
    this.$store.commit('SET_LAYOUT', 'app-layout')
  },
  mounted() {
   this.getRoles()
 },

 methods: {
   getRoles() {
     axios.get('roles')
       .then((res) => {
         this.roles = res.data
       }, () => {
         console.log("error")
       })
   }
 }
}
</script>
