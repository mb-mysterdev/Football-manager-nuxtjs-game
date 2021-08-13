<template>
  <div>
    <v-text-field
      v-model="search"
      label="Solo"
      placeholder="Placeholder"
      solo
    />
    <v-row>
      <v-col
        v-for="country in filteredCountries"
        :key="country.country_name"
        cols="3"
      >
        <country
          src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Flag_of_France.svg/langfr-225px-Flag_of_France.svg.png"
          :height="150"
          :title="country.country_name"
          :href="'/france'"
        />
      </v-col>
    </v-row>
  </div>
</template>

<script>
import Country from '~/components/Country/Country'
export default {
  name: 'HomeCountry',
  components: { Country },
  data () {
    return {
      search: '',
      countries: null
    }
  },
  computed: {
    filteredCountries () {
      if (this.countries !== null) {
        return this.countries.filter((country) => {
          return country.country_name.toLowerCase().includes(this.search.toLowerCase())
        })
      }
      return this.countries
    }
  },
  mounted () {
    this.getCountries()
  },
  methods: {
    async getCountries () {
      await this.$axios.get('http://localhost/api/countries').then((res) => {
        this.countries = res.data
      })
    }
  }
}
</script>

<style scoped>

</style>
