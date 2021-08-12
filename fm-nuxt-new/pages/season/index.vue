<template>
  <div>
    <soccer-game-mini v-for="match in matches" :key="match.fm_id" :match="match" />
  </div>
</template>

<script>
import SoccerGameMini from '@/components/SoccerGame/SoccerGameMini'
export default {
  name: 'Index',
  components: { SoccerGameMini },
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
      await this.$axios.get('http://localhost/api/fm/1/2021/1').then((res) => {
        this.matches = res.data
      })
    }
  }
}
</script>

<style scoped>

</style>
