<template>
  <div />
</template>

<script>
export default {
  name: 'Index',
  mounted () {
    this.$axios.post('http://localhost/api/auth/me').then(res => console.log(res.data))
  }
}
</script>

<style scoped>

</style>
