import Login from "./pages/auth/Login";
import UserDashboard from "./components/users/UserDashboard";
import {store} from './store/index'
import UserList from "./components/users/UserList";
import SideBar from "./components/ui/base/SideBar";
export const routes = [
    {
        name:'sidebar',
        path: '/v/sidebar',
        component: SideBar,
    },
    {
        path: '/',
        component: Login,
        beforeEnter: (to, from, next) => {
            console.log(store.getters['isAuthenticated'],"suth data")
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
        name: 'login',
        path: '/v/login',
        component: Login,
        beforeEnter: (to, from, next) => {
            console.log(store.getters['isAuthenticated'],"suth data")
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
        beforeEnter:(to,from,next) => {
            console.log(store.getters['isAuthenticated'],"ssadsa data")
            if(store.getters['isAuthenticated']){
                console.log("hello");
            }
            let token = localStorage.getItem("token");
        if(!token){
            return next({
                  name:'login'
                })
            }
            return  next()
        }
    },
    {
        name: 'users',
        path: '/v/users',
        component: UserList,
    }

];
