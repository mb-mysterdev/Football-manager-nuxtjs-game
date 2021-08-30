<template>
  <ListTeams :teams="listTeams" />
</template>

<script>
import ListTeams from '@/components/Teams/ListTeams'
import auth from '@/mixins.js/auth'

export default {

  name: 'HomeEligibleTeams',

  components: { ListTeams },
  mixins: [auth],
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
      await this.$axios.get('http://localhost/api/teams/' + this.cookiesUser.id + '/eligible').then((res) => {
        this.listTeams = res.data
      })
    }
  }
}
</script>
