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
          {{ item.name }}
        </div>
      </template>

      <template #[getItemLevels()]="{ item }">
        <v-chip
          :color="getColor(item.levels)"
        >
          {{ item.levels }}
        </v-chip>
      </template>

      <template #[getItemObjective()]="{ item }">
        <div v-for="i in item.objective" :key="i.name">
          {{ i.name }} : {{ i.classment }}
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
        <v-btn>Choice {{ item.choice }}</v-btn>
      </template>
    </v-data-table>
  </div>
</template>

<script>
export default {
  name: 'ListTeams',
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
          value: 'name'
        },
        { text: 'Levels', value: 'levels' },
        { text: 'Budget (M€)', value: 'budget' },
        { text: 'effective', value: 'effective' },
        { text: 'objective', value: 'objective' },
        { text: '', value: 'choice' }
      ],
      teams: [
        {
          id: 1,
          name: 'Frozen Yogurt',
          levels: 93,
          budget: 6.0,
          effective: 24,
          objective: { 1: { name: 'Championnat de France', classment: 1 }, 2: { name: 'Champion des leagues', classment: 16 } },
          choice: 1
        },
        {
          id: 2,
          name: 'Ice cream sandwich',
          levels: 55,
          budget: 9.0,
          effective: 37,
          objective: { 1: { name: 'Championnat de France', classment: 1 }, 2: { name: 'Champion des leagues', classment: 16 } },
          choice: 1

        },
        {
          id: 3,
          name: 'Eclair',
          levels: 78,
          budget: 16.0,
          effective: 23,
          objective: { 1: { name: 'Championnat de France', classment: 1 }, 2: { name: 'Champion des leagues', classment: 16 } },
          choice: 1

        }
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
    getItemLevels () {
      return 'item.levels'
    },
    getItemObjective () {
      return 'item.objective'
    },
    getItemChoice () {
      return 'item.choice'
    },
    getItemName () {
      return 'item.name'
    },
    getColor (levels) {
      if (levels > 90) { return 'red' } else if (levels > 80) { return 'pink' } else if (levels > 60) { return 'orange' } else { return 'green' }
    },
    getTeamInfo (team) {
      console.log(team)
      this.dialog = true
    }
  }
}
</script>
