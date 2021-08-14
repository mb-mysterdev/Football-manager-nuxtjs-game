<template>
  <v-card
    class="mx-auto"
    max-width="400"
  >
    <v-img
      class="white--text align-end"
      height="200px"
      src="https://www.dailymercato.com/storage/icon-sport/champions-league-trophee.jpeg"
    />
    <v-row class="d-flex justify-center">
      <v-col>
        <v-card-subtitle class="d-flex justify-center">
          {{ firstTeamName }}
        </v-card-subtitle>
      </v-col>
      <v-col>
        <v-card-subtitle class="d-flex justify-center">
          VS
        </v-card-subtitle>
      </v-col>
      <v-col>
        <v-card-subtitle class="d-flex justify-center">
          {{ secondTeamName }}
        </v-card-subtitle>
      </v-col>
    </v-row>

    <v-card-text class="text--primary d-flex justify-end">
      <div>{{ nextMatch.fm_date }}</div>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: 'SoccerGame',
  props: {
    nextMatch: {
      default: null
    }
  },
  data () {
    return {
      firstTeamName: '',
      secondTeamName: ''
    }
  },
  updated () {
    if (this.nextMatch.first_team !== undefined && this.nextMatch.second_team !== undefined) {
      this.firstTeamName = this.nextMatch.first_team.team_name
      this.secondTeamName = this.nextMatch.second_team.team_name
    }
  }
}
</script>

<style scoped>

</style>
