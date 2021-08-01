<template>
  <v-card
    class="mx-auto"
    max-width="400"
  >
    <v-img
      class="white--text align-end"
      height="200px"
      src="https://www.dailymercato.com/storage/icon-sport/champions-league-trophee.jpeg"
    />
    <v-row class="d-flex justify-center">
      <v-col>
        <v-card-subtitle class="d-flex justify-center">
          PSG
        </v-card-subtitle>
      </v-col>
      <v-col>
        <v-card-subtitle class="d-flex justify-center">
          VS
        </v-card-subtitle>
      </v-col>
      <v-col>
        <v-card-subtitle class="d-flex justify-center">
          PSG
        </v-card-subtitle>
      </v-col>
    </v-row>

    <v-card-text class="text--primary d-flex justify-end">
      <div>01/08/2021 14:00:00</div>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: 'SoccerGame'
}
</script>

<style scoped>

</style>
