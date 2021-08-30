<template>
  <login-register-component />
</template>

<script>
import LoginRegisterComponent from '@/components/Connection/LoginRegister/LoginRegisterComponent'
import auth from '@/mixins.js/auth'

export default {
  name: 'Index',
  components: { LoginRegisterComponent },
  mixins: [auth],
  layout: 'empty',

  beforeMount () {
    console.log(this.isOnline)
    // if (this.isOnline) {
    //   this.$router.push('/')
    // }
  }
}
</script>
