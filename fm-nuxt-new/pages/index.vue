<template>
  <div>
    <Navbar />
    <home-country />
  </div>
</template>

<script>
import Navbar from '~/components/Navbar/Navbar.vue'
import HomeCountry from '~/pages/home-country'

export default {
  components: { HomeCountry, Navbar }
}
</script>
