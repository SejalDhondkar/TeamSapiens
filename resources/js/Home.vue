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

    <v-container fluid class="m-4 p-4">
      <v-row>
        <v-col cols="12">
          <p class="headings">Features</p>
        </v-col>
        <v-col cols="12" sm="6" class="d-flex justify-center mx-auto">
          <v-card raised class="m-4 p-4 mx-auto" width="400">
            <p class="feature-heading">For Students</p><br>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>100% Verified Internships</p>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>In-Built Resume Feature</p>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>Performance Tracking</p>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>Profile Ratings</p>
          </v-card>
        </v-col>
        <v-col cols="12" sm="6" class="d-flex justify-center mx-auto">
          <v-card raised class="m-4 p-4 mx-auto" width="400">
            <p class="feature-heading">For Employers</p><br>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>Post Internships for free</p>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>Performance Tracking</p>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>Verified Student Profiles</p>
            <p class="features">
              <v-icon color="success">mdi-check</v-icon>24x7 Customer Support</p>
          </v-card>
        </v-col>

        <v-col cols="12">
          <br><br><p class="headings">About Us</p>
        </v-col>
        <v-col cols="12" class="text d-flex flex-column">
        <v-container>
          <v-card flat tile>
            PrepIntern is a startup initiative of YuvaLeads aimed at providing guaranteed internships in all technical & non technical
            domains and tracking intern's performance throughout the internship.<br> In today's digital world getting
            an internship is not a very difficult task but evaluating that "HOW MUCH HAVE I LEARNT IN THIS INTERNSHIP ?" is
            still a question mark.<br> PrepIntern is focused on providing end to end solution to Internship System. Students
            can apply for internships in any technical & non technical domain.
            <br>Companies interested in hiring interns will be benefited by getting potential interns through PrepIntern. We
            match up company's requirements with our pool of interns to serve you best results.
          </v-card>
          </v-container>
        </v-col>
      </v-row>
    </v-container>

    <v-footer app absolute padless color="grey darken-3" class="p-2">
      <v-card-text class="white--text text-center">
        <v-btn class="text-decoration-none" icon dark href="https://m.facebook.com/PrepIntern/?tsid=0.7696890637138489&source=result">
          <v-icon>mdi-facebook</v-icon>
        </v-btn>
        <v-btn class="mx-2 text-decoration-none" icon dark href="https://www.instagram.com/p/CBShS3Nn4lO/?igshid=dr3lpnp2ro8q">
          <v-icon>mdi-instagram</v-icon>
        </v-btn>
        <v-btn class="mx-2 text-decoration-none" icon dark href="https://www.linkedin.com/company/prepintern/">
          <v-icon>mdi-linkedin</v-icon>
        </v-btn>
        <v-btn class="mx-2 text-decoration-none" icon dark href="mailto:prepinternindia@gmail.com">
          <v-icon>mdi-email-outline</v-icon>
        </v-btn>
        <br> Sapiens &copy; {{ new Date().getFullYear() }} - All Rights Reserved<br>
      </v-card-text>
    </v-footer>
  </v-app>
</template>
<script>
export default {
  data() {
    return {

    }
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
      }
    }
}
</script>
