<template>
  <v-container fluid fill-height>
    <v-layout align-center justify-center>
      <v-card
        class="mx-auto p-4"
        width="700"
        raised
      >
        <v-form
        ref="form"
        v-model="valid"
        lazy-validation
      >
        <v-text-field
          v-model="role.title"
          :counter="20"
          :rules="titleRules"
          label="Title"
          required
        ></v-text-field>

        <v-text-field
          v-model="role.description"
          :rules="descriptionRules"
          :counter="200"
          label="Description"
          required
        ></v-text-field>


        <v-btn
          :disabled="!valid"
          color="success"
          class="mr-4"
          @click="submit"
        >
          Submit
        </v-btn>


      </v-form>
      </v-card>
    </v-layout>
  </v-container>
</template>

<script>
  export default {
    data: () => ({
      valid: true,

      titleRules: [
        v => !!v || 'Title is required',
        v => (v && v.length <= 20) || 'Title must be less than 20 characters',
      ],

      descriptionRules: [
        v => !!v || 'Description is required',
        v => (v && v.length <= 200) || 'Description must be less than 200 characters',
      ],
      role: {
          title: '',
          description: '',
      }

    }),

    created() {
        let url = process.env.MIX_APP_URL + `/api/roles/${this.$route.params.id}/edit`;
        this.axios.get(url).then((response) => {
            this.role = response.data;
        });
      },

    methods: {
    submit() {
      this.errors = {};
      axios.put(`/roles/${this.$route.params.id}/update/`, this.role).then(response => {
        console.log('Message sent!');
        this.$router.push('/roles');
      }).catch(error => {
        if (error.response.status === 422) {
        console.log("error");
        }
      });

    },
  },
  }
</script>
