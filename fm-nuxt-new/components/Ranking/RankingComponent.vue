<template>
  <v-container fluid>
    <v-card
      class="mx-auto"
      max-width="300"
      tile
    >
      <v-list shaped>
        <v-subheader>{{ division.division_name }}</v-subheader>
        <v-list-item-group
          color="primary"
        >
          <v-list-item
            v-for="(item, i) in division.teams"
            :key="i"
          >
            <v-list-item-content>
              <v-img :src="item.team.team_logo" max-width="30" max-height="30" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.team.team_name" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.tu_ranking" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.tu_pts" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.tu_buts" />
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-card>
  </v-container>
</template>

<script>
export default {
  name: 'RankingComponent',
  props: {
    division: {
      type: [Array, Object]
    }
  },
  data () {
    return {
      localItems: {
        type: [Array, Object]
      }
      // name: 'Ligue1'
      // items: [
      //   { classification: 1, club: 'Chelsea', pts: 10 },
      //   { classification: 2, club: 'PSG', pts: 8 },
      //   { classification: 2, club: 'Man United', pts: 8 },
      //   { classification: 2, club: 'Leiceister', pts: 8 },
      //   { classification: 2, club: 'Man city', pts: 8 },
      //   { classification: 2, club: 'Lyon', pts: 8 },
      //   { classification: 2, club: 'Es Tunis', pts: 8 }
      // ]
    }
  },
  watch: {
    division (newVal, oldVal) {
      Object.assign(this.localItems, newVal)
      // this.localItems.teams.map(function (item) {
      //   console.log(item)
      // })
    }
  }
}
</script>

<style scoped>

</style>
