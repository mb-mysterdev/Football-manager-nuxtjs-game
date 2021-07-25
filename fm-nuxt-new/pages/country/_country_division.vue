<template>
  <div>
    {{ $route.params }}
    <v-row>
      <divison-component :height="150" :width="150" title="Ligue1" src="https://www.sportbusinessmag.com/wp-content/uploads/2020/12/Ligue-1.png" />
    </v-row>
  </div>
</template>

<script>
import DivisonComponent from '~/components/Divison/DivisonComponent'
export default {
  name: 'CountryDivison',
  components: { DivisonComponent }
}
</script>
