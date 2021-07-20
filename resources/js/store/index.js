import Vue from 'vue'
import Vuex from 'vuex'
import {auth} from './modules/auth'
import {checkin} from './modules/checkin'
Vue.use(Vuex)

export const store = new Vuex.Store({
    modules: {
        auth,checkin,
    }
});
