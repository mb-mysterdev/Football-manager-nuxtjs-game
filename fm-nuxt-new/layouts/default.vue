<template>
  <v-app
    style="
  background-image: url('https://www.pixelstalk.net/wp-content/uploads/2016/10/Football-Live-Wallpapers-HD-Free-Download-2.jpg');
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
    }
    await this.playMatch()
  },
  methods: {
    async playMatch () {
      await this.$axios.get('http://localhost/api/fm/play-match')
    }
  }
}
</script>
