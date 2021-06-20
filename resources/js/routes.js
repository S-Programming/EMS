import Login from "./pages/auth/Login";
import UserDashboard from "./components/users/UserDashboard";

export const routes = [
    {
        name: 'login',
        path: '/login',
        component: Login,
        // beforeEnter: (to, from, next) => {
        //     if (store.getters.isLogged) {
        //         console.log("Hello routes")
        //         next()
        //         return
        //     }
        //     console.log("Hello routes not")
        //
        //     next('/login')
        // },
    },
    {
        name: 'userDashboard',
        path: '/dashboard',
        component: UserDashboard,

    },
];
