<template>
  <v-app
    style="
  background-image: url('https://www.ledgerinsights.com/wp-content/uploads/2021/03/football-soccer-810x524.jpg');
  background-repeat: no-repeat;background-size: contain"
  >
    <navbar />
    <nuxt />
  </v-app>
</template>
<script>
import Navbar from '~/components/Navbar/Navbar'
export default {
  components: { Navbar }
}
</script>
