<template>
  <div>
    <v-container
      fluid
    >
      <div class="d-flex justify-center">
        <h2>
          Choisir une équipe
        </h2>
      </div>
      <v-radio-group v-model="radioGroup">
        <div class="d-flex justify-center">
          <v-radio
            v-for="n in listDisplayBy"
            :key="n.id"
            class="pr-3"
            :label="` ${n.name}`"
            :value="n.id"
          />
        </div>
      </v-radio-group>
    </v-container>
    <home-eligible-teams v-if="radioGroup === 1" />
    <home-country v-else />
  </div>
</template>

<script>
import HomeCountry from '@/pages/home-country'
import HomeEligibleTeams from '@/pages/home-eligible-teams'
export default {
  name: 'HomeChoiceTeam',
  components: { HomeEligibleTeams, HomeCountry },
  middleware: 'auth',
  data () {
    return {
      radioGroup: 1,
      listDisplayBy: [{ id: 1, name: 'Par équipe eligible' }, { id: 2, name: 'Par Pays' }]
    }
  }
}

</script>

<style scoped>

</style>
