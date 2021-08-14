<template>
  <v-card>
    <v-img
      height="50px"
      src="https://imgresizer.eurosport.com/unsafe/1200x0/filters:format(jpeg):focal(1151x656:1153x654)/origin-imgresizer.eurosport.com/2020/03/13/2794188-57667770-2560-1440.jpg"
    >
      <v-row>
        <v-col style="max-width: 200px">
          <v-card-text>
            {{ match.fm_date }}
          </v-card-text>
        </v-col>
        <v-row class="d-flex justify-center display-4 font-weight-black">
          <v-col style="flex-grow: 0">
            <v-card-text>
              {{ firstTeamName }}
            </v-card-text>
          </v-col>
          <v-col style="flex-grow: 0">
            <v-card-text v-if="Date.now() > Date(match.fm_date)">
              '-':'-'
            </v-card-text>
            <v-card-text style="width: 60px">
              <span>{{ match.fm_result_fc }}</span><span> : </span><span>{{ match.fm_result_sc }}</span>
            </v-card-text>
          </v-col>
          <v-col style="flex-grow: 0">
            <v-card-text>
              {{ secondTeamName }}
            </v-card-text>
          </v-col>
        </v-row>
      </v-row>
    </v-img>
  </v-card>
</template>

<script>
export default {
  name: 'SoccerGameMini',
  props: {
    match: {
      type: [Array, Object]
    }
  },
  data () {
    return {
      firstTeamName: '',
      secondTeamName: ''
    }
  },
  mounted () {
    if (this.match.first_team !== undefined && this.match.second_team !== undefined) {
      this.firstTeamName = this.match.first_team.team_name
      this.secondTeamName = this.match.second_team.team_name
    }
  }
}
</script>

<style scoped>

</style>
