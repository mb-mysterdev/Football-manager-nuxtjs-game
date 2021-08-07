<template>
  <div>
    <v-app-bar
      color="accent-4"
      dense
      height="20px"
      class="text-sm-body-2 d-flex justify-center"
    >
      <team-speed-info-component
        :team-name="teamName"
        :team-power="team.tu_power"
        :team-budget="team.tu_budget"
        :team-ranking-in-official-division="3"
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
            Home
          </nuxt-link>
        </v-tab>
        <v-tab>
          <nuxt-link to="/ranking">
            Classement
          </nuxt-link>
        </v-tab>
        <v-tab>
          <nuxt-link to="/season">
            Saison
          </nuxt-link>
        </v-tab>
        <v-tab>
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
    teamName: '',
    team: {
      default () {
        return { tu_power: 0, tu_budget: 0, tu_name: '' }
      },
      type: Object
    }
  }),
  async mounted () {
    await this.getUser()
    this.teamName = ''
    if (this.user.team !== null) {
      this.teamName = this.team.team.team_name
    }
  },
  methods: {
    async getUser () {
      await this.$axios.get('http://localhost/api/users/1').then((res) => {
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
