<template>
  <div>
    <v-app-bar
      color="accent-4"
      dense
      height="20px"
      class="text-sm-body-2 d-flex justify-center"
    >
      <team-speed-info-component :team-name="teams.tu_name" :team-power="teams.tu_power" :team-budget="teams.tu_budget" :team-ranking-in-official-division="3" />
    </v-app-bar>
    <v-app-bar
      color="accent-4"
      dense
      height="70px"
    >
      <v-tabs align-with-title>
        <v-tab>
          <nuxt-link to="/">
            Home
          </nuxt-link>
        </v-tab>
        <!--        <v-tab>-->
        <!--          <nuxt-link to="/team/1">-->
        <!--            Equipe-->
        <!--          </nuxt-link>-->
        <!--        </v-tab>-->
        <v-tab>
          <nuxt-link to="/ranking">
            Classement
          </nuxt-link>
        </v-tab>
        <!--        <v-tab>Transfert</v-tab>-->
      </v-tabs>
    </v-app-bar>
  </div>
</template>

<script>
import TeamSpeedInfoComponent from '@/components/Teams/Team/TeamSpeedInfoComponent'
export default {
  name: 'Navbar',
  components: { TeamSpeedInfoComponent },
  data: () => ({
    items: [
      { title: 'Click Me' },
      { title: 'Click Me' },
      { title: 'Click Me' },
      { title: 'Click Me 2' }
    ],
    user: {
      type: Object
    },
    teams: {
      type: Object
    }
  }),
  async mounted () {
    await this.getUser()
  },
  methods: {
    async getUser () {
      await this.$axios.get('http://localhost/api/users/1').then((res) => {
        this.user = res.data[0]
        this.teams = this.user.teams[0]
      })
    }
  }
}
</script>

<style scoped>

</style>
