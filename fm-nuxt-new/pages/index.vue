<template>
  <div v-if="userHasTeams">
    <div class="d-flex justify-center">
      Prochain Match
    </div>
    <div><soccer-game /></div>
  </div>
  <div v-else-if="!userHasTeams">
    <home-choice-team />
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
      }
    }
  },
  async mounted () {
    await this.getUser()
    this.userHasTeams = this.user[0].teams.length
  },
  methods: {
    async getUser () {
      await this.$axios.get('http://localhost/api/users/1').then((res) => {
        this.user = res.data
      })
    }
  }
}
</script>
