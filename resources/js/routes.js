import Login from "./pages/auth/Login";
import UserDashboard from "./components/users/UserDashboard";
import {store} from './store/index'
import UserList from "./components/users/UserList";

export const routes = [
    {
        name: 'login',
        path: '/v/login',
        component: Login,
        // beforeEnter: (to, from, next) => {
        //     if (store.getters['auth/isAuthenticated']) {
        //         console.log("Yahooo");
        //         next()
        //         return
        //     }
        //     next('login')
        // },
    },
    {
        name: 'userDashboard',
        path: '/v/dashboard',
        component: UserDashboard,
        // beforeEnter:(to,from,next) => {
        // if(!store.getters['auth/isAuthenticated']){
        //     return next({
        //           name:'login'
        //         })
        //     }
        //     next()
        // }
    },
    {
        name: 'users',
        path: '/v/users',
        component: UserList,
    }

];
