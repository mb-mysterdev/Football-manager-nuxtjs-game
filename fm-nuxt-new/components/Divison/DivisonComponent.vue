<template>
  <v-card>
    <v-img
      :src="src"
      :height="height"
      :width="width"
      class="grey darken-4"
    />
    <v-card-title class="text-h6 text-center">
      <NuxtLink :to="'/division/'+title">
        {{ title }}
      </NuxtLink>
    </v-card-title>
  </v-card>
</template>

<script>
export default {
  name: 'DivisonComponent',
  props: {
    width: Number,
    src: String,
    height: Number,
    title: String
  }
}
</script>

<style scoped>

</style>
