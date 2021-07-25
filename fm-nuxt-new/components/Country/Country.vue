<template>
  <v-card>
    <v-img
      :src="src"
      :height="height"
      class="grey darken-4"
    />
    <v-card-title :href="href" class="text-h6 text-center">
      {{ title }}
    </v-card-title>
  </v-card>
</template>

<script>
export default {
  name: 'Country',
  props: {
    src: String,
    height: Number,
    title: String,
    href: String
  }
}
</script>

<style scoped>

</style>
