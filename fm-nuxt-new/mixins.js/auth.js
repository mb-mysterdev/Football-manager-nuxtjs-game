import Cookies from 'js-cookie'

export default {
  computed: {
    isOnline () {
      try {
        return JSON.parse(Cookies.get('user')) !== null
      } catch (e) {
        return false
      }
    },
    cookiesUser () {
      return JSON.parse(Cookies.get('user'))
    }
  }
}
