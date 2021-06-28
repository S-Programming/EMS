import axios from 'axios';
const state = {}
const getters = {}
const mutations = {}
const actions = {
    async actionCheckin(){
        let response = await axios.post('/confirm/checkin');
    }
}

export default {
    state,
    getters,
    mutations,
    actions
}
