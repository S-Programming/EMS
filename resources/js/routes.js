import Login from "./pages/auth/Login";
import UserDashboard from "./components/users/UserDashboard";
import {store} from './store/index'
import UserList from "./components/users/UserList";

export const routes = [
    {
        name: 'login',
        path: '/v/login',
        component: Login,
        beforeEnter: (to, from, next) => {
            let token = localStorage.getItem("token");
            if (typeof token!=='undefined' && token){
                return next({
                    name: 'userDashboard'
                 })

            }
            return next()
        },
    },
    {
        name: 'userDashboard',
        path: '/v/dashboard',
        component: UserDashboard,
        // beforeEnter:(to,from,next) => {
        //     console.log(store.getters['isAuthenticated'],"dashboard");
        // if(!store.getters['isAuthenticated']){
        //     return next({
        //           name:'login'
        //         })
        //     }
        // console.log(next(),"next()",to,from)
        //     next({
        //         name:'dashboard'
        //     })
        // }
    },
    {
        name: 'users',
        path: '/v/users',
        component: UserList,
    }

];
