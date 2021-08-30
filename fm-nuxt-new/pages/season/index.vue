<template>
  <div>
    <soccer-game-mini v-for="match in matches" :key="match.fm_id" :match="match" />
  </div>
</template>

<script>
import SoccerGameMini from '@/components/SoccerGame/SoccerGameMini'
import auth from '@/mixins.js/auth'
import user from '@/mixins.js/user'
export default {

  name: 'Index',
  components: { SoccerGameMini },
  mixins: [auth, user],
  data () {
    return {
      matches: {
        type: [Array, Object]
      }
    }
  },

  async mounted () {
    await this.getMatches()
  },
  methods: {
    async getMatches () {
      await this.$axios.get('http://localhost/api/fm/' + this.cookiesUser.id + '/2021/' + this.getUserInfo.team.team.team_division).then((res) => {
        this.matches = res.data
      })
    }
  }
}
</script>

<style scoped>

</style>
