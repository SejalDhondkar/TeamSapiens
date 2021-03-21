<template>
<v-app>
    <v-app-bar app color="teal">
      Sapiens

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
  <div class="container" style="width:1200px;">
    
    <div class="card card-default">
      <div class="card-header">Details</div>

      <div class="row hidden-md-up">
        <div class="col-md-6">
          <div class="card m-4">
            <div class="card-body">
              Hospital Name: {{hosp.name}}<br>
              Contact No. {{hosp.contact}}<br>
              Full Address: {{hosp.addr}}<br>
              Location: {{hosp.area}}<br>
              Available Beds: {{hosp.vacant_beds}}<br>
              Total Beds: {{hosp.total_beds}}<br>
              Available Vaccines: {{hosp.available_vaccines}}<br>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card m-4">
            <div class="card-body">
              <h4>Notify them of your Arrival</h4>
                 <form autocomplete="off" @submit.prevent="submit" method="post">
          <div class="form-group">
            <label for="name">Your Name</label>
            <input type="name" id="name" class="form-control" v-model="pt.name" required>
          </div>
          <div class="form-group">
            <label for="contact">Contact Number</label>
            <input type="contact" id="contact" class="form-control" v-model="pt.contact" required>
          </div>
          <div class="form-group">
            <label for="addr">Address</label>
            <input type="addr" id="addr" class="form-control" v-model="pt.addr" required>
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="age" id="age" class="form-control" v-model="pt.age" required>
          </div>
          <div class="form-group">
            <label for="diabetes">Do you have Diabetes? (Yes/No)</label>
            <input type="diabetes" id="diabetes" class="form-control" v-model="pt.diabetes" required>
          </div>
          <div class="form-group">
            <label for="pulse">Pulse Reading</label>
            <input type="pulse" id="pulse" class="form-control" v-model="pt.pulse">
          </div>
          <div class="form-group">
            <label for="covid">Are you Covid Positive? (Yes / No / Don't know)</label>
            <input type="covid" id="covid" class="form-control" v-model="pt.covid" required>
          </div>
          <button type="submit" class="btn btn-success">Send</button>
        </form>
            </div>
          </div>
        </div>
    </div>

    </div>
  </div>
</v-app>
</template>

<script>

  export default {
    data() {
      
      return {
        hosp: {
          hosp_id: '',
          name: '',
          contact: '',
          edit: '',
          addr: '',
          area: '',
          total_beds: '',
          vacant_beds: '',
          total_vaccines: '',
          available_vaccines: '',
        },
        pt: {
          name: '',
          contact: '',
          age: '',
          addr: '',
          diabetes: '',
          pulse: '',
          covid: '',
      }
      }
    },
    created(){
      let url = process.env.MIX_APP_URL + `/api/hospital/${this.$route.params.id}/view`;
        this.axios.get(url).then((response) => {
            this.hosp = response.data;
            console.log(this.hosp);
        });

    },
    components: {
      //
    },

    methods: {
      submit() {
      this.pt.hosp_id = this.hosp.hosp_id;
      console.log(this.pt);
      this.errors = {};
      axios.post(`hospital/request/store`, this.pt).then(response => {
        console.log('Message sent!');
        this.$router.push('/hospitals');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });
      }
    },
    
    
  }
</script>