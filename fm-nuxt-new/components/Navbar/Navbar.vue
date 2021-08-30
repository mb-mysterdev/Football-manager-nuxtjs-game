<template>
  <div>
    <v-app-bar
      v-if="playerHasTeam"
      color="accent-4"
      dense
      height="20px"
      class="text-sm-body-2 d-flex justify-center"
    >
      <team-speed-info-component
        :team-name="teamName"
        :team-power="team.tu_power"
        :team-budget="team.tu_budget"
        :team-ranking-in-official-division="team.tu_ranking"
      />
    </v-app-bar>
    <v-app-bar
      color="accent-4"
      dense
      height="70px"
    >
      <v-tabs align-with-title>
        <v-tab>
          <nuxt-link to="/">
            Accueil
          </nuxt-link>
        </v-tab>
        <v-tab v-if="playerHasTeam">
          <nuxt-link to="/ranking">
            Classement
          </nuxt-link>
        </v-tab>
        <v-tab v-if="playerHasTeam">
          <nuxt-link to="/season">
            Saison
          </nuxt-link>
        </v-tab>
        <v-tab v-if="playerHasTeam">
          <nuxt-link to="/calendar">
            Calendrier
          </nuxt-link>
        </v-tab>
      </v-tabs>
    </v-app-bar>
  </div>
</template>

<script>
import TeamSpeedInfoComponent from '@/components/Teams/Team/TeamSpeedInfoComponent'
import Cookies from 'js-cookie'
export default {
  name: 'Navbar',
  components: { TeamSpeedInfoComponent },
  data: () => ({
    user: {
      type: Object
    },
    teamName: '',
    team: { tu_power: 0, tu_budget: 0, tu_ranking: 0, tu_name: '' }
  }),
  computed: {
    playerHasTeam () {
      if (!this.team.tu_power && !this.team.tu_budget && this.team.tu_name === '') {
        return false
      }
      return true
    }
  },
  async mounted () {
    await this.getUser()
    this.teamName = ''
    if (this.user.team !== null) {
      this.teamName = this.team.team.team_name
    }
  },
  methods: {
    async getUser () {
      this.user = JSON.parse(Cookies.get('user'))
      await this.$axios.get('http://localhost/api/users/' + this.user.id).then((res) => {
        this.user = res.data[0]
        if (this.user.team !== null) {
          this.team = this.user.team
        }
      })
    }
  }
}
</script>

<style scoped>

</style>
