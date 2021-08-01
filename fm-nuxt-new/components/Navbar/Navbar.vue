<template>
  <div>
    <v-app-bar
      color="accent-4"
      dense
      height="20px"
      class="text-sm-body-2 d-flex justify-center"
    >
      <team-speed-info-component />
    </v-app-bar>
    <v-app-bar
      color="accent-4"
      dense
      height="70px"
    >
      <v-tabs align-with-title>
        <v-tab>
          <nuxt-link to="/">
            Home
          </nuxt-link>
        </v-tab>
        <!--        <v-tab>-->
        <!--          <nuxt-link to="/team/1">-->
        <!--            Equipe-->
        <!--          </nuxt-link>-->
        <!--        </v-tab>-->
        <v-tab>
          <nuxt-link to="/ranking">
            Classement
          </nuxt-link>
        </v-tab>
        <!--        <v-tab>Transfert</v-tab>-->
      </v-tabs>
    </v-app-bar>
  </div>
</template>

<script>
import TeamSpeedInfoComponent from '@/components/Teams/Team/TeamSpeedInfoComponent'
export default {
  name: 'Navbar',
  components: { TeamSpeedInfoComponent },
  data: () => ({
    items: [
      { title: 'Click Me' },
      { title: 'Click Me' },
      { title: 'Click Me' },
      { title: 'Click Me 2' }
    ]
  })
}
</script>

<style scoped>

</style>
