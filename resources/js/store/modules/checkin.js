import axios from 'axios';
const state = {}
const getters = {
    lets(){
        console.log("asdas");
    }
}
const mutations = {}
const actions = {
    async actionCheckin(){
        let response = await axios.post('/confirm/checkin');
    }
}

export const checkin = {
    state,
    getters,
    mutations,
    actions
}
