<template>
  <v-container>
    <ranking-component v-if="myTeam !== null" :division="division" :my-team="myTeam" />
  </v-container>
</template>

<script>
import RankingComponent from '@/components/Ranking/RankingComponent'
import { mapGetters } from 'vuex'

export default {

  name: 'Ranking',
  components: { RankingComponent },
  middleware: 'auth',
  data () {
    return {
      division: {
        type: [Array, Object]
      },
      myTeam: {
        default: null
      }
    }
  },
  computed: {
    ...mapGetters({
      user: 'auth/user'
    })
  },
  async mounted () {
    await this.getDivision()
    this.myTeam = this.getMyTeam()[0]
  },
  methods: {
    getMyTeam () {
      return this.division.teams.filter((team) => { return team.tu_taken && team.tu_active })
    },
    async getDivision () {
      await this.$axios.get('http://localhost/api/division/' + this.$store.$auth.user.id + '/1').then((res) => {
        this.division = res.data
      })
    }
  }
}
</script>
