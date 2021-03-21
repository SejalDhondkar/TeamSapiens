<template>
  <v-app>
    <v-app-bar app color="teal">
      <h3 style="color:white;" @click="home">Sapiens</h3>

      <v-spacer></v-spacer>

      <v-btn class="ma-2 text-decoration-none" tile outlined color="white" to="/hospitals">
        Hospitals List
      </v-btn>

      <v-btn class="ma-2 text-decoration-none" tile outlined color="white" to="/doctors">
        Doctors List
      </v-btn>

      <v-btn v-if="!$auth.check()" class="ma-2 text-decoration-none" tile outlined color="white" to="/login">
        Log In
      </v-btn>

      <!-- <v-btn v-if="!$auth.check()" class="ma-2 text-decoration-none" tile outlined color="white" to="/register">
        Register
      </v-btn> -->

      <v-btn v-if="$auth.check()" class="ma-2 text-decoration-none" tile outlined color="white" @click="dashboard()">
        Go to Dashboard
      </v-btn>

      <v-btn v-if="$auth.check()" class="ma-2 text-decoration-none" tile color="white" @click.prevent="$auth.logout()">
        Log Out
      </v-btn>

    </v-app-bar>

    <v-container fluid >
        <div class="row hidden-md-up">
        <div class="col-md-6">
        <div class="card-body">
        <div>
            <div class="alert alert-danger" v-if="has_error">
            <p>Error, unable to connect to server. Please contact administrator</p>
            </div>

            <table id="myTable" class="table">
            <tr>
                <th scope="col">Hospital Name</th>
                <th scope="col">Available Beds</th>
                <th scope="col">Total Beds</th>
                <th scope="col">Available Vaccines</th>
                <th scope="col">Location</th>
                <th scope="col">Action</th>
            </tr>
            <tr v-for="hosp in hospitals" v-bind:key="hosp.id" style="margin-bottom: 5px;">
                <th scope="row">{{ hosp.name }}</th>
                <td>{{ hosp.vacant_beds }}</td>
                <td>{{ hosp.total_beds }}</td>
                <td>{{ hosp.available_vaccines}}</td>
                <td>{{ hosp.area}}</td>
                <td><v-btn class="ma-2 text-decoration-none" tile outlined color="black" @click="viewhosp(hosp)">View Details</v-btn></td>
            </tr>
            </table>
        </div>
        </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="card m-4">
            <div class="card-body">
              <h3>Filter</h3>
                <br><br>
                <input type="text" id="myInput" @change="myFunction()" placeholder="Search for names..">
                <form autocomplete="off" @submit.prevent="submit" method="post">
                    <div class="form-group">
                        <label for="name">Enter Hospital Name</label>
                        <input type="name" id="name" class="form-control" v-model="data.name" required>
                    </div>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </form>
                
            </div>
          </div>
        </div> -->
        </div>
    </v-container>
  </v-app>
</template>
<script>

export default {
  data() {
    return {
        has_error: false,
        hospitals: null,

    }
  },
  mounted() {
      this.getHosp()
    },
  created(){
    this.$store.commit('SET_LAYOUT', 'blank-layout')
  },
  methods: {
    home() {
      this.$router.push({ path: '/' })
    },
      dashboard() {
        if (this.$auth.user().role_id === 1) {
          this.$router.push({ path: '/admin/dashboard' })
        }
        if (this.$auth.user().role_id === 2) {
          this.$router.push({ path: '/dashboard' })
        }
      },
      viewhosp(h){
        this.$route.params.id = h.hosp_id;
        this.$router.push(`/hospital/${this.$route.params.id}/view`);
      },
      getHosp() {
        this.$http({
          url: `/hospital/list`,
          method: 'GET'
        })
          .then((res) => {
            this.hospitals = res.data;
            // console.log(this.hospitals)
          }, () => {
            this.has_error = true
          })
      }
    }
}
</script>

<style>
#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}
table {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

  th{
    background-color: teal;
    
  }

 th, td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

 tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

tr:nth-child(even){background-color: #7fffd4;}

 tr.header,  tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
</style>
