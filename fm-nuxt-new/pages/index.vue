<template>
  <div>
    <Navbar />
    <home-choice-team />
  </div>
</template>

<script>
import Navbar from '~/components/Navbar/Navbar.vue'
import HomeChoiceTeam from '~/pages/home-choice-team'

export default {
  components: { HomeChoiceTeam, Navbar }
}
</script>
