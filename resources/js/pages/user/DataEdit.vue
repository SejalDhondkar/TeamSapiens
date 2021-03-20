<template>
  <div class="container">
    <div class="card card-default">
      <div class="card-header">Edit Details</div>

      <div class="card-body">
        <form autocomplete="off" @submit.prevent="submit" method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="name" id="name" class="form-control" v-model="data.name" required>
          </div>
          <div class="form-group">
            <label for="contact">Contact Number</label>
            <input type="contact" id="contact" class="form-control" v-model="data.contact" required>
          </div>
          <div class="form-group">
            <label for="addr">Address</label>
            <input type="addr" id="addr" class="form-control" v-model="data.addr" required>
          </div>
          <div class="form-group">
            <label for="area">Location</label>
            <input type="area" id="area" class="form-control" v-model="data.area" required>
          </div>
          <div class="form-group">
            <label for="total_beds">Total Beds</label>
            <input type="total_beds" id="total_beds" class="form-control" v-model="data.total_beds" required>
          </div>
          <div class="form-group">
            <label for="vacant_beds">Available Beds</label>
            <input type="vacant_beds" id="vacant_beds" class="form-control" v-model="data.vacant_beds" required>
          </div>
          <div class="form-group">
            <label for="total_vaccines">Total Vaccines</label>
            <input type="total_vaccines" id="total_vaccines" class="form-control" v-model="data.total_vaccines" required>
          </div>
          <div class="form-group">
            <label for="available_vaccines">Available Vaccines</label>
            <input type="available_vaccines" id="available_vaccines" class="form-control" v-model="data.available_vaccines" required>
          </div>
          <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data: () => ({
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

    }),

    created() {
        this.$store.commit('SET_LAYOUT', 'user-layout');
        let url = process.env.MIX_APP_URL + `/api/hospital/${this.$route.params.id}/edit`;
        this.axios.get(url).then((response) => {
            this.data = response.data;
            console.log(this.data);
        });
      },

    methods: {
    submit() {
      console.log(this.data);
      this.errors = {};
      this.$route.params.id = this.$auth.user().id;
      axios.post(`/hospital/${this.$route.params.id}/update/`, this.data).then(response => {
        console.log('Message sent!');
        this.$router.push('/dashboard');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });

    },
  },
  }
</script>
