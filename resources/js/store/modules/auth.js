import axios from 'axios';
const state = {
    user: null,
    // token: localStorage.getItem('token') || ''
}
const getters = {
    isLogged: state => !!state.user
}
const mutations = {
    setUserData (state, userData) {
        state.user = userData
        // localStorage.setItem('user', JSON.stringify(userData))

        // axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`
    },
    clearUserData () {
        localStorage.removeItem('user')
        location.reload()
    }
}
const actions = {

    actionLogin({commit},credentials){
        return axios
            .post('/login',credentials)
            .then(({ data }) => {
                commit('setUserData', data.user_data.user_data)
            })
    },
    logout ({ commit }) {
        commit('clearUserData')
    }
}
export const auth = {
    state,
    getters,
    actions,
    mutations
};
