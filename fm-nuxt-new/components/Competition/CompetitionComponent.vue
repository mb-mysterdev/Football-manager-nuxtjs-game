<template>
  <v-container fluid>
    <v-data-iterator
      :items="items"
      :items-per-page.sync="itemsPerPage"
      :page.sync="page"
      hide-default-footer
    >
      <template #default="props">
        <v-row>
          <v-col
            v-for="item in props.items"
            :key="item.name"
            cols="12"
            sm="6"
            md="4"
            lg="3"
          >
            <v-card>
              <v-card-title class="subheading font-weight-bold">
                {{ item.name }}
              </v-card-title>

              <v-divider />

              <v-list dense>
                <div class="d-flex">
                  <div>
                    <v-col>classification </v-col>
                    <div v-for="value in item.compet" :key="value.club">
                      <v-row>
                        <v-col>{{ value.classification }} </v-col>
                      </v-row>
                    </div>
                  </div>
                  <v-spacer />
                  <div>
                    <v-col>Club </v-col>
                    <div v-for="value in item.compet" :key="value.club">
                      <v-row>
                        <v-col>{{ value.club }} </v-col>
                      </v-row>
                    </div>
                  </div>
                  <v-spacer />

                  <div>
                    <v-col>Pts </v-col>
                    <div v-for="value in item.compet" :key="value.club">
                      <v-row>
                        <v-col>{{ value.pts }} </v-col>
                      </v-row>
                    </div>
                  </div>
                </div>
              </v-list>
            </v-card>
          </v-col>
        </v-row>
      </template>

      <template #footer>
        <v-row
          class="mt-2"
          align="center"
          justify="center"
        >
          <span class="grey--text">Items per page</span>
          <v-menu offset-y>
            <template #activator="{ on, attrs }">
              <v-btn
                text
                color="primary"
                class="ml-2"
                v-bind="attrs"
                v-on="on"
              >
                {{ itemsPerPage }}
                <v-icon>mdi-chevron-down</v-icon>
              </v-btn>
            </template>
            <v-list>
              <v-list-item
                v-for="(number, index) in itemsPerPageArray"
                :key="index"
                @click="updateItemsPerPage(number)"
              >
                <v-list-item-title>{{ number }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>

          <v-spacer />

          <span
            class="mr-4
            grey--text"
          >
            Page {{ page }} of {{ numberOfPages }}
          </span>
          <v-btn
            fab
            color="blue darken-3"
            class="mr-1"
            @click="formerPage"
          >
            <v-icon>mdi-chevron-left</v-icon>
          </v-btn>
          <v-btn
            fab
            color="blue darken-3"
            class="ml-1"
            @click="nextPage"
          >
            <v-icon>mdi-chevron-right</v-icon>
          </v-btn>
        </v-row>
      </template>
    </v-data-iterator>
  </v-container>
</template>

<script>
export default {
  name: 'CompetitionComponent',
  data () {
    return {
      itemsPerPageArray: [4, 8],
      filter: {},
      sortDesc: false,
      page: 1,
      itemsPerPage: 4,
      sortBy: 'name',
      keys: [
        'compet'
      ],
      items: [
        {
          name: 'Ligue1',
          compet: [{ classification: 1, club: 'Chelsea', pts: 10 }, { classification: 2, club: 'PSG', pts: 8 }]
        },
        {
          name: 'Coupe de France',
          compet: [{ classification: 1, club: 'Chelsea', pts: 8 }, { classification: 2, club: 'PSG', pts: 6 }]
        }
      ]
    }
  },
  computed: {
    numberOfPages () {
      return Math.ceil(this.items.length / this.itemsPerPage)
    }
  },
  methods: {
    nextPage () {
      if (this.page + 1 <= this.numberOfPages) { this.page += 1 }
    },
    formerPage () {
      if (this.page - 1 >= 1) { this.page -= 1 }
    },
    updateItemsPerPage (number) {
      this.itemsPerPage = number
    }
  }
}
</script>

<style scoped>

</style>
