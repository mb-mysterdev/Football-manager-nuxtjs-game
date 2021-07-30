<template>
  <div>
    <v-container
      class="px-0"
      fluid
    >
      <div>Display by</div>
      <v-radio-group v-model="radioGroup">
        <v-radio
          v-for="n in listDisplayBy"
          :key="n.id"
          :label="` ${n.name}`"
          :value="n.id"
        />
      </v-radio-group>
    </v-container>
    <home-eligible-teams v-if="radioGroup === 1" />
    <home-country v-else />
  </div>
</template>

<script>
import HomeCountry from '@/pages/user/home-country'
import HomeEligibleTeams from '@/pages/user/home-eligible-teams'
export default {
  name: 'HomeChoiceTeam',
  components: { HomeEligibleTeams, HomeCountry },
  data () {
    return {
      user: {
        type: Object
      },
      radioGroup: 1,
      listDisplayBy: [{ id: 1, name: 'Available Team' }, { id: 2, name: 'Country' }]
    }
  },
  async mounted () {
    await this.getUser()
    console.log(this.user)
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

<style scoped>

</style>
