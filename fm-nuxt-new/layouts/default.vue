<template>
  <v-app
    style="
  background-image: url('https://www.homewallmurals.co.uk/ekmps/shops/allwallpapers/images/paper-photo-wallpaper-football-stadium-champions--[2]-32457-p.jpg');
  background-repeat: no-repeat;
  background-size: cover;"
  >
    <navbar />
    <nuxt />
  </v-app>
</template>
<script>
import Navbar from '~/components/Navbar/Navbar'
import auth from '~/mixins.js/auth'

export default {
  components: { Navbar },
  mixins: [auth],

  async mounted () {
    if (!this.isOnline) {
      await this.$router.push('/login')
    } else {
      await this.$router.push('/')
      await this.playMatch()
    }
  },
  methods: {
    async playMatch () {
      await this.$axios.get('http://localhost/api/fm/play-match')
    }
  }
}
</script>
