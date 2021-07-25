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
import HomeCountry from '~/pages/home-country'
import HomeEligibleTeams from '~/pages/home-eligible-teams'
export default {
  name: 'HomeChoiceTeam',
  components: { HomeEligibleTeams, HomeCountry },
  data () {
    return {
      radioGroup: 1,
      listDisplayBy: [{ id: 1, name: 'Available Team' }, { id: 2, name: 'Country' }]
    }
  }
}

</script>

<style scoped>

</style>
