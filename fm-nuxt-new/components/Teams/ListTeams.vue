<template>
  <v-data-table
    :headers="headers"
    :items="teams"
    class="elevation-1"
  >
    <template #[getItemLevels()]="{ item }">
      <v-chip
        :color="getColor(item.levels)"
        dark
      >
        {{ item.levels }}
      </v-chip>
    </template>

    <template #[getItemObjective()]="{ item }">
      <div v-for="i in item.objective" :key="i.name">
        {{ i.name }} : {{ i.classment }}
      </div>
    </template>
  </v-data-table>
</template>

<script>
export default {
  name: 'ListTeams',
  data () {
    return {
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
        { text: 'objective', value: 'objective' }
      ],
      teams: [
        {
          name: 'Frozen Yogurt',
          levels: 159,
          budget: 6.0,
          effective: 24,
          objective: { 1: { name: 'Championnat de France', classment: 1 }, 2: { name: 'Champion des leagues', classment: 16 } }
        },
        {
          name: 'Ice cream sandwich',
          levels: 237,
          budget: 9.0,
          effective: 37,
          objective: { 1: { name: 'Championnat de France', classment: 1 }, 2: { name: 'Champion des leagues', classment: 16 } }
        },
        {
          name: 'Eclair',
          levels: 262,
          budget: 16.0,
          effective: 23,
          objective: { 1: { name: 'Championnat de France', classment: 1 }, 2: { name: 'Champion des leagues', classment: 16 } }
        }
      ]
    }
  },
  methods: {
    getItemLevels () {
      return 'item.levels'
    },
    getItemObjective () {
      return 'item.objective'
    },
    getColor (levels) {
      if (levels > 400) { return 'red' } else if (levels > 200) { return 'orange' } else { return 'green' }
    }
  }
}
</script>
