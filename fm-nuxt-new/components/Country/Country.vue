<template>
  <v-card>
    <v-img
      :src="src"
      :height="height"
      class="grey darken-4"
    />
    <v-card-title class="text-h6 text-center">
      <NuxtLink :to="'country/'+title">
        {{ title }}
      </NuxtLink>
    </v-card-title>
  </v-card>
</template>

<script>
export default {
  name: 'Country',
  props: {
    src: {
      default: ''
    },
    height: {
      default: 0
    },
    title: {
      default: ''
    }
  }
}
</script>

<style scoped>

</style>
