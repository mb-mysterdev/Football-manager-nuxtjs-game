<template>
  <v-row>
    <v-col v-for="(division,id) in divisions" :key="id">
      <division-component
        :id="division.division_id"
        :height="150"
        :width="150"
        :title="division.division_name"
        src="https://www.sportbusinessmag.com/wp-content/uploads/2020/12/Ligue-1.png"
      />
    </v-col>
  </v-row>
</template>

<script>
import DivisionComponent from '@/components/Division/DivisionComponent'
export default {
  name: 'CountryDivison',
  components: { DivisionComponent },
  data () {
    return {
      divisions: null
    }
  },
  mounted () {
    this.getDivisionWithCountryName()
  },
  methods: {
    async getDivisionWithCountryName () {
      await this.$axios.get('http://localhost/api/countries/' + this.$route.params.country_division).then((res) => {
        this.divisions = res.data[0].divisions
      })
    }
  }
}
</script>
