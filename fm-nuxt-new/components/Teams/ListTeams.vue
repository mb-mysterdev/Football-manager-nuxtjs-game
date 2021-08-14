<template>
  <div>
    <v-data-table
      :headers="headers"
      :items="teams"
      class="elevation-1"
    >
      <template
        #[getItemName()]="{ item }"
      >
        <div @click="getTeamInfo(item)">
          {{ item.team_name }}
        </div>
      </template>

      <template #[getItemPower()]="{ item }">
        <v-chip
          :color="getColor(item.team_power)"
        >
          {{ item.team_power }}
        </v-chip>
      </template>

      <template #[getItemObjective()]="{ item }">
        <div v-for="i in item.team_objective" :key="i.name">
          {{ i.name }} : {{ i.classement }}
        </div>
      </template>
      <template #top>
        <v-row justify="center" class="mb-5">
          <v-dialog
            v-model="dialog"
            width="600px"
          >
            <v-switch v-model="historyOfClub" :label="'show ' + computedLabelOfHistoryTeam" />
            <v-data-table
              v-if="!historyOfClub"
              dense
              :headers="headers"
              :items="teams"
              item-key="name"
              class="elevation-1"
            />
            <div v-else>
              Championnat du monde 2010
            </div>
          </v-dialog>
        </v-row>
      </template>
      <template #[getItemChoice()]="{ item }">
        <v-btn @click="choiceMyTeam(item)">
          Choice {{ item.choice }}
        </v-btn>
      </template>
    </v-data-table>
  </div>
</template>

<script>
export default {
  name: 'ListTeams',
  props: {
    teams: []
  },
  data () {
    return {
      historyOfClub: false,
      labelOfHistoryTeam: 'Teams',
      dialog: false,
      headers: [
        {
          text: 'Team',
          align: 'start',
          sortable: false,
          value: 'team_name'
        },
        { text: 'Power', value: 'team_power' },
        { text: 'Budget (M€)', value: 'team_budget' },
        { text: 'objective', value: 'team_objective' },
        { text: '', value: 'choice' }
      ]
    }
  },
  computed: {
    computedLabelOfHistoryTeam () {
      if (this.historyOfClub) {
        return 'History'
      }
      return 'Teams'
    }
  },
  methods: {
    choiceMyTeam (item) {
      this.$axios.post('http://localhost/api/create-match-team-user',
        {
          tu_user: 1,
          tu_team: item.team_id,
          tu_budget: item.team_budget,
          tu_power: item.team_power,
          tu_taken: 1,
          tu_division: item.team_division,
          tu_active: 1
        })
      this.$router.push('/')
    },
    getItemPower () {
      return 'item.team_power'
    },
    getItemObjective () {
      return 'item.team_objective'
    },
    getItemChoice () {
      return 'item.choice'
    },
    getItemName () {
      return 'item.team_name'
    },
    getColor (levels) {
      if (levels > 90) { return 'red' } else if (levels > 80) { return 'pink' } else if (levels > 60) { return 'orange' } else { return 'green' }
    },
    getTeamInfo () {
      this.dialog = true
    }
  }
}
</script>
