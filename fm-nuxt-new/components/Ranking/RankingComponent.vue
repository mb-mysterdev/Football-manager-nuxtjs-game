<template>
  <v-container fluid>
    <v-card
      class="mx-auto"
      max-width="100%"
      tile
    >
      <v-list shaped>
        <v-subheader>{{ division.division_name }}</v-subheader>
        <v-list-item-group
          v-model="selectedTeam"
          active-class="primary-opacity"
        >
          <v-list-item>
            <!-- Team -->
            <v-list-item-content>
              <v-list-item-title>
                Club
              </v-list-item-title>
            </v-list-item-content>
            <v-list-item-content>
              <div />
            </v-list-item-content>
            <v-list-item-content>
              <div />
            </v-list-item-content>

            <!-- Match -->
            <v-list-item-content>
              <v-list-item-title>
                J
              </v-list-item-title>
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title>
                G
              </v-list-item-title>
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title>
                N
              </v-list-item-title>
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title>
                P
              </v-list-item-title>
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title>
                BP
              </v-list-item-title>
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title>
                BC
              </v-list-item-title>
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title>
                DB
              </v-list-item-title>
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title>
                Pts
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-list-item
            v-for="item in division.teams"
            :key="item.tu_id"
          >
            <!-- Team -->
            <v-list-item-content>
              <v-list-item-title v-text="item.tu_ranking" />
            </v-list-item-content>
            <v-list-item-content>
              <v-img :src="item.team.team_logo" max-width="30" max-height="30" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.team.team_name" />
            </v-list-item-content>

            <!-- Match -->
            <v-list-item-content>
              <v-list-item-title v-text="item.tu_j" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.tu_g" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.tu_n" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.tu_p" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.tu_bp" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.tu_bc" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.tu_db" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.tu_pts" />
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
    myTeam: {
      default: 1
    },
    division: {
      type: [Array, Object]
    }
  },
  data () {
    return {
      selectedTeam: 1,
      localItems: {
        type: [Array, Object]
      }
    }
  },
  watch: {
    division (newVal) {
      Object.assign(this.localItems, newVal)
    },
    myTeam (newVal, oldVal) {
      this.selectedTeam = newVal.tu_id
    }
  }
}
</script>

<style scoped>
  .primary-opacity {
    background-color: #8fff9b36 !important;
  }
</style>
