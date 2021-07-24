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
        :key="country.name"
        cols="3"
      >
        <country
          src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Flag_of_France.svg/langfr-225px-Flag_of_France.svg.png"
          :height="150"
          :title="country.name"
        />
      </v-col>
    </v-row>
  </div>
</template>

<script>
import Country from '../components/Country/Country'
export default {
  name: 'HomeCountry',
  components: { Country },
  data () {
    return {
      search: '',
      // eslint-disable-next-line no-dupe-keys
      countries: { 1: { name: 'France' }, 2: { name: 'Belgique' }, 3: { name: 'Allemagne' }, 4: { name: 'Espagne' } }
    }
  },
  computed: {
    filteredCountries () {
      return Object.values(this.countries).filter((country) => {
        return country.name.toLowerCase().includes(this.search.toLowerCase())
      })
    }
  }
}
</script>

<style scoped>

</style>
