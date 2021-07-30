<template>
  <v-card>
    <v-img
      :src="src"
      :height="height"
      class="grey darken-4"
    />
    <v-card-title class="text-h6 text-center">
      <NuxtLink :to="'user/country/'+title">
        {{ title }}
      </NuxtLink>
    </v-card-title>
  </v-card>
</template>

<script>
export default {
  name: 'Country',
  props: {
    src: String,
    height: Number,
    title: String
  }
}
</script>

<style scoped>

</style>
