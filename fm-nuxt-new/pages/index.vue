<template>
  <div>
    <div v-if="!userHasTeams && nextMatch">
      <div>Pas de match prochainement</div>
      <home-choice-team />
    </div>
    <div v-if="userHasTeams && nextMatch">
      <div class="d-flex justify-center">
        Prochain Match
      </div>
      <div><soccer-game :next-match="nextMatch" /></div>
    </div>
  </div>
</template>

<script>
import HomeChoiceTeam from '@/pages/home-choice-team'
import SoccerGame from '@/components/SoccerGame/SoccerGame'

export default {
  name: 'Index',
  components: { SoccerGame, HomeChoiceTeam },
  data () {
    return {
      userHasTeams: Boolean,
      user: {
        type: Object
      },
      nextMatch: {
        type: Object
      }
    }
  },
  async created () {
    await this.getUser()
    this.userHasTeams = this.user[0].team && this.user[0].team.tu_taken === 1 && this.user[0].team.tu_active === 1 ? 1 : 0
    await this.getNextMatch()
  },
  methods: {
    async getUser () {
      await this.$axios.get('http://localhost/api/users/1').then((res) => {
        this.user = res.data
      })
    },
    async getNextMatch () {
      await this.$axios.get('http://localhost/api/fm/1/1/2021/next-match').then((res) => {
        this.nextMatch = res.data
      })
    }
  }
}
</script>
