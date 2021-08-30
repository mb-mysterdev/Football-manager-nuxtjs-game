import Cookies from 'js-cookie'

export default {
  computed: {
    isOnline () {
      try {
        return this.cookiesUser !== null && this.token !== null
      } catch (e) {
        return false
      }
    },
    cookiesUser () {
      try {
        return JSON.parse(Cookies.get('user'))
      } catch (e) {
        return null
      }
    },
    token () {
      try {
        return JSON.parse(Cookies.get('token'))
      } catch (e) {
        return null
      }
    }
  }
}
