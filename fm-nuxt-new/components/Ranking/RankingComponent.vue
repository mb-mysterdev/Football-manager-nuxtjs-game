<template>
  <v-container fluid>
    <v-card
      class="mx-auto"
      max-width="300"
      tile
    >
      <v-list shaped>
        <v-subheader>Division {{ name }}</v-subheader>
        <v-list-item-group
          color="primary"
        >
          <v-list-item
            v-for="(item, i) in items"
            :key="i"
          >
            <!--            <v-list-item-icon>-->
            <!--              <v-icon v-text="item.icon" />-->
            <!--            </v-list-item-icon>-->
            <v-list-item-content>
              <v-list-item-title v-text="item.classification" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.club" />
            </v-list-item-content>
            <v-list-item-content>
              <v-list-item-title v-text="item.pts" />
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
  data () {
    return {
      name: 'Ligue1',
      items: [
        { classification: 1, club: 'Chelsea', pts: 10 },
        { classification: 2, club: 'PSG', pts: 8 },
        { classification: 2, club: 'Man United', pts: 8 },
        { classification: 2, club: 'Leiceister', pts: 8 },
        { classification: 2, club: 'Man city', pts: 8 },
        { classification: 2, club: 'Lyon', pts: 8 },
        { classification: 2, club: 'Es Tunis', pts: 8 }
      ]
    }
  }
}
</script>

<style scoped>

</style>
