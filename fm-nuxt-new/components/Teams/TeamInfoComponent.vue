<template>
  <v-dialog
    max-width="500px"
  >
    <v-card>
      <v-card-title class="text-h5">
        Use Google's location service?
      </v-card-title>

      <v-card-text>
        Let Google help apps determine location. This means sending anonymous location data to Google, even when no apps are running.
      </v-card-text>

      <v-card-actions>
        <v-spacer />

        <v-btn
          color="green darken-1"
          text
        >
          Disagree
        </v-btn>

        <v-btn
          color="green darken-1"
          text
        >
          Agree
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: 'TeamInfoComponent'
}
</script>

<style scoped>

</style>
