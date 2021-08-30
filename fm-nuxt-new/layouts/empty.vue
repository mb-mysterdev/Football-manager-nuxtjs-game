<template>
  <v-app>
    <nuxt />
  </v-app>
</template>

<script>
import auth from '~/mixins.js/auth'

export default {
  name: 'Empty',
  mixins: [auth],

  mounted () {
    if (this.isOnline) {
      this.$router.push('/')
    }
  }
}
</script>

<style scoped>

</style>
