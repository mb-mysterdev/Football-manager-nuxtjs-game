<template>
  <ListTeams :teams="listTeams" />
</template>

<script>
import ListTeams from '@/components/Teams/ListTeams'
export default {
  name: 'HomeEligibleTeams',
  components: { ListTeams },
  data () {
    return {
      listTeams: []
    }
  },
  async mounted () {
    await this.eligibleTeams()
  },
  methods: {
    async eligibleTeams () {
      await this.$axios.get('http://localhost/api/teams/1/eligible').then((res) => {
        this.listTeams = res.data
      })
    }
  }
}
</script>
