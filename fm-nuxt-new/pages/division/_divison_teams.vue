<template>
  <div>
    <list-teams :teams="teamsOfMyDivision" />
  </div>
</template>

<script>
import ListTeams from '@/components/Teams/ListTeams'
export default {

  name: 'DivisonTeams',
  components: { ListTeams },
  middleware: 'auth',
  data () {
    return {
      teamsOfMyDivision: []
    }
  },
  async mounted () {
    await this.fetchTeams()
  },
  methods: {
    async fetchTeams () {
      await this.$axios.get('http://localhost/api/division/' + this.$route.params.divison_teams).then((res) => {
        this.teamsOfMyDivision = res.data[0].default_teams
      })
    }
  }
}
</script>

<style scoped>

</style>
