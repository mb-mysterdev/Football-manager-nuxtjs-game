<template>
  <div>
    <v-app-bar
      color="accent-4"
      dense
      height="20px"
      class="text-sm-body-2"
    >
      <div>Niveau : 3</div>
      <v-spacer />
      <div>Popularité : 50</div>
      <v-spacer />
      <div>Trésorie : 500.00 €</div>
    </v-app-bar>
    <v-app-bar
      color="accent-4"
      dense
      height="70px"
    >
      <v-tabs align-with-title>
        <v-tab>
          <nuxt-link to="/user">
            Home
          </nuxt-link>
        </v-tab>
        <v-tab>
          <nuxt-link to="/user/team/1">
            Equipe
          </nuxt-link>
        </v-tab>
        <v-tab>
          <nuxt-link to="/user/competition">
            Compétition
          </nuxt-link>
        </v-tab>
        <v-tab>Transfert</v-tab>
      </v-tabs>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  name: 'Navbar',
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
