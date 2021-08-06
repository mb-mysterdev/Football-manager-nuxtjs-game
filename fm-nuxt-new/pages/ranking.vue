<template>
  <ranking-component :division="division" />
</template>

<script>
import RankingComponent from '@/components/Ranking/RankingComponent'
export default {
  name: 'Ranking',
  components: { RankingComponent },
  data () {
    return {
      division: {
        type: [Array, Object]
      }
    }
  },
  async mounted () {
    await this.getDivision()
  },
  methods: {
    async getDivision () {
      await this.$axios.get('http://localhost/api/division/1/1').then((res) => {
        this.division = res.data[0]
      })
    }
  }
}
</script>
