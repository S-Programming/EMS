import axios from 'axios';
const state = {
    user: null,
    token: null,//localStorage.getItem('token') || ''
}
const getters = {
    isAuthenticated(state){
        return state.token && state.user
    },
    getUser(state){
        return state.user
    },
}
const mutations = {
    setUserData (state, userData) {
        state.user = userData
        // localStorage.setItem('user', JSON.stringify(userData))

        // axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`
    },
    setToken(state,token){
        state.token = token;
    },
    clearUserData () {
        localStorage.removeItem('user')
        location.reload()
    }
}
const actions = {

   async actionLogin({dispatch,commit},credentials){
        let response = await axios.post('/login',credentials);
        // console.log(response,"response")
        dispatch('attempt',response.data.token)
        commit('setUserData',response.data.user_data)
    },
    async attempt({commit, state},token) {
        if (token) {
            localStorage.setItem('token',token)
            commit('setToken', token);
        }
        if (!state.token)
        {
            return
        }
        // try{
        //     let response =  await axios.get('',{
        //         headers:{
        //             'Authorization':'Bearer' + token
        //         }
        //     })
        //
        // }catch (e) {
        //     commit('setToken',null)
        //     commit('setUserData',null)
        // }
    },
    logout ({ commit }) {
       localStorage.removeItem('token')
        return axios.post('logout').then(() => {
            commit('setToken',null)
            commit('setUserData',null)
        })
        commit('clearUserData')
    }
}
export const auth = {
    state,
    getters,
    actions,
    mutations
};
