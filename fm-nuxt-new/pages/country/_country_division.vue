<template>
  <div>
    {{ $route.params }}
    <v-row>
      <divison-component
        v-for="division in divisions"
        :key="division"
        :height="150"
        :width="150"
        title="div"
        src="https://www.sportbusinessmag.com/wp-content/uploads/2020/12/Ligue-1.png"
      />
    </v-row>
  </div>
</template>

<script>
import DivisonComponent from '@/components/Divison/DivisonComponent'
export default {
  name: 'CountryDivison',
  components: { DivisonComponent },
  data () {
    return {
      divisions: null
    }
  },
  mounted () {
    this.getDivisionWithCountryName()
    console.log(this.divisions)
  },
  methods: {
    async getDivisionWithCountryName () {
      await this.$axios.get('http://localhost/api/countries/' + this.$route.params).then((res) => {
        this.divisions = res.data.divisions
      })
    }
  }
}
</script>
