<template>
  <div class="text-center">
    <v-chip
      class="ma-2"
      color="blue"
      text-color="white"
    >
      Puissance : {{ teamPower }}
    </v-chip>
    <v-chip
      class="ma-2"
      color="blue"
      text-color="white"
    >
      Budget : {{ teamBudget }}
    </v-chip>
    <v-chip
      class="ma-2"
      color="blue"
      text-color="white"
    >
      Classement : {{ teamRankingInOfficialDivision }}
    </v-chip>
    <v-chip
      class="ma-2"
      color="blue"
      text-color="white"
    >
      Effectif : {{ teamEffective }}
    </v-chip>
  </div>
</template>

<script>
export default {
  name: 'TeamSpeedInfoComponent',
  props: {
    teamPower: {
      default: 0,
      type: Number
    },
    teamBudget: {
      default: 0,
      type: Number
    },
    teamRankingInOfficialDivision: {
      default: 0,
      type: Number
    },
    teamEffective: {
      default: 0,
      type: Number
    }
  }
}
</script>

<style scoped>

</style>
