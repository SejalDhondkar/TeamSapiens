<template>
  <div class="container">
    
    <div class="card card-default">
      <div class="card-header">Dashboard</div>

      <div class="row hidden-md-up">
        <div class="col-md-6">
          <div class="card m-4">
            <div class="card-body">
              Total Beds: {{data.total_beds}}
                <br><br>
                Available Beds: {{data.vacant_beds}}
                <br><br>
                Occupied Beds: {{data.total_beds - data.vacant_beds}}
                <br><br>
                <button type="button" class="btn btn-success" @click="add">1 Bed Vacant</button>
                <button type="button" class="btn btn-danger" @click="subtract">1 Bed Occupied</button>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card m-4">
            <div class="card-body">
              Total Vaccines: {{data.total_vaccines}}
              <br><br>
              Available Vaccines: {{data.available_vaccines}}
              <br><br>
              <button type="button" class="btn btn-danger" @click="subtractvac">1 Vaccine Used</button>
            </div>
          </div>
        </div>
    </div>

    </div>
  </div>
</template>

<script>

  export default {
    data() {
      return {
        data: {
          name: '',
          contact: '',
          edit: '',
          addr: '',
          area: '',
          total_beds: '',
          vacant_beds: '',
          total_vaccines: '',
          available_vaccines: '',
        }
      }
    },
    created(){
      this.$store.commit('SET_LAYOUT', 'user-layout');
      this.$route.params.id = this.$auth.user().id;
      let url = process.env.MIX_APP_URL + `/api/hospital/${this.$route.params.id}/edit`;
        this.axios.get(url).then((response) => {
            this.data = response.data;
        });

    },
    components: {
      //
    },

    methods: {
      add() {
        this.$route.params.id = this.$auth.user().id;
        axios.get(`/hospital/${this.$route.params.id}/add/`, this.data).then(response => {
        console.log('Message sent!');
        let url = process.env.MIX_APP_URL + `/api/hospital/${this.$route.params.id}/edit`;
        this.axios.get(url).then((response) => {
            this.data = response.data;
        });
        });
    },
    subtract() {
        this.$route.params.id = this.$auth.user().id;
        axios.get(`/hospital/${this.$route.params.id}/subtract/`).then(response => {
        console.log('Message sent!');
        let url = process.env.MIX_APP_URL + `/api/hospital/${this.$route.params.id}/edit`;
        this.axios.get(url).then((response) => {
            this.data = response.data;
        });
        });
    },
    subtractvac() {
        this.$route.params.id = this.$auth.user().id;
        axios.get(`/hospital/${this.$route.params.id}/subtractvac/`).then(response => {
        console.log('Message sent!');
        let url = process.env.MIX_APP_URL + `/api/hospital/${this.$route.params.id}/edit`;
        this.axios.get(url).then((response) => {
            this.data = response.data;
        });
        });
    }
    }
    
  }
</script>