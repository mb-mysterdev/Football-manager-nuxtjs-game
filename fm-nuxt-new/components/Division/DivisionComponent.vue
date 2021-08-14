<template>
  <v-card>
    <v-img
      :src="src"
      :height="height"
      :width="width"
      class="grey darken-4"
    />
    <v-card-title class="text-h6 text-center">
      <NuxtLink :to="'/division/'+id">
        {{ title }}
      </NuxtLink>
    </v-card-title>
  </v-card>
</template>

<script>
export default {
  name: 'DivisonComponent',
  props: {
    id: {
      default: 0
    },
    width: {
      default: 0
    },
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
