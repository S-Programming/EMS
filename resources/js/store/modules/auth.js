import axios from 'axios';
const state = {
    user: null,
    token: null,//localStorage.getItem('token') || ''
}
const getters = {
    isAuthenticated(state){
    console.log(state.token && state.user,"asdasdas")
        return state.token //&& state.user

    },
    getUser(state){
        console.log(state,state.user,"getUser getter");
        return state.user
    },
}
const mutations = {
    setUserData (state, userData) {
        console.log(userData,"Hello")
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
        // console.log(response.data.user_data,"response")
        // console.log(response.data.user_id,"response")
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
