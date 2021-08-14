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
export default {
  components: { Navbar },
  async mounted () {
    await this.playMatch()
  },
  methods: {
    async playMatch () {
      await this.$axios.get('http://localhost/api/fm/play-match').then((res) => {
      })
    }
  }
}
</script>
