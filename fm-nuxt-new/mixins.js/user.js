import Cookies from 'js-cookie'

export default {
  computed: {
    getUserInfo () {
      try {
        return JSON.parse(Cookies.get('userInfo'))[0]
      } catch (e) {
        return null
      }
    }
  }
}
