import Cookies from 'js-cookie'

// state
export const state = () => ({
  user: null,
  /**
   * Last change logs since the user last logged in
   */
  token: Cookies.get('token')
})

// getters
export const getters = {
  user: state => state.user,
  token: state => state.token,
  check: state => state.user !== null
}

// mutations
export const mutations = {
  'SAVE_TOKEN' (state, { token, remember }) {
    state.token = token
    Cookies.set('token', token, { expires: remember ? 365 : null })
  },

  'FETCH_USER_SUCCESS' (state, { user }) {
    state.user = user
  },

  'FETCH_USER_FAILURE' (state) {
    state.token = null
    Cookies.remove('token')
  },

  'LOGOUT' (state) {
    state.user = null
    state.token = null

    Cookies.remove('token')
  },

  'UPDATE_USER' (state, { user }) {
    state.user = user
  }
}

// actions
export const actions = {
  saveToken ({ commit, dispatch }, payload) {
    commit('SAVE_TOKEN', payload)
  }

}
