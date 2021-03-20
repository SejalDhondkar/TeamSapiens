<template>
  <v-app>
    <v-app-bar app color="white">
      Sapiens

      <v-spacer></v-spacer>

      <v-btn class="ma-2 text-decoration-none" tile outlined color="primary" to="/hospitals">
        Hospitals List
      </v-btn>

      <v-btn class="ma-2 text-decoration-none" tile outlined color="primary" to="/doctors">
        Doctors List
      </v-btn>

      <v-btn v-if="!$auth.check()" class="ma-2 text-decoration-none" tile outlined color="primary" to="/login">
        Log In
      </v-btn>

      <v-btn v-if="!$auth.check()" class="ma-2 text-decoration-none" tile outlined color="primary" to="/register">
        Register
      </v-btn>

      <v-btn v-if="$auth.check()" class="ma-2 text-decoration-none" tile outlined color="primary" @click="dashboard()">
        Go to Dashboard
      </v-btn>

      <v-btn v-if="$auth.check()" class="ma-2 text-decoration-none" tile color="primary" @click.prevent="$auth.logout()">
        Log Out
      </v-btn>

    </v-app-bar>

    <v-container fluid >
            <div class="card-body">
        <div>
            <div class="alert alert-danger" v-if="has_error">
            <p>Error, unable to connect to server. Please contact administrator</p>
            </div>

            <table class="table">
            <tr>
                <th scope="col">Doctor Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Location</th>
                <th scope="col">Full Address</th>

            <tr v-for="doc in doctors" v-bind:key="doc.id" style="margin-bottom: 5px;">
                <th scope="row">{{ doc.name }}</th>
                <td>{{ doc.email }}</td>
                <td>{{ doc.contact }}</td>
                <td>{{ doc.area}}</td>
                <td>{{ doc.addr}}</td>

            </tr>
            </table>
        </div>
        </div>
    </v-container>
  </v-app>
</template>
<script>
export default {
  data() {
    return {
        has_error: false,
        doctors: null,

    }
  },
  mounted() {
      this.getHosp()
    },
  created(){
    this.$store.commit('SET_LAYOUT', 'blank-layout')
  },
  methods: {
      dashboard() {
        if (this.$auth.user().role_id === 1) {
          this.$router.push({ path: '/admin/dashboard' })
        }
        if (this.$auth.user().role_id === 2) {
          this.$router.push({ path: '/dashboard' })
        }
      },
      getHosp() {
        this.$http({
          url: `/doctor/list`,
          method: 'GET'
        })
          .then((res) => {
            this.doctors = res.data;
            console.log(this.doctors)
          }, () => {
            this.has_error = true
          })
      }
    }
}
</script>

<style>
table {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

 th, td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

 tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

 tr.header,  tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
</style>
