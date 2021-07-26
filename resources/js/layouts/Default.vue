<template>
    <div id="app">
<!--        <div v-if="isAuthenticated" id="page-container"-->
<!--             //page-header-fixed
class="sidebar-o enable-page-overlay sidebar-dark side-scroll  main-content-narrow">-->
<!--            <TopBar />-->
<!--            <SideBar></SideBar>-->
<!--            <div style="margin-top: 60px">-->
<!--                <child></child>-->
<!--            </div>-->
<!--        </div>-->
<!--        <UserDashboard></UserDashboard>-->
<SideBar></SideBar>
<!--        <component v-bind:is="componentName"></component>-->
    </div>
</template>
<script>
    import TopBar from "../components/ui/base/TopBar";
    import Child from "../components/utilities/Child";
    import Login from "../pages/auth/Login";
    import {mapGetters} from 'vuex'
    import UserDashboard from "../components/users/UserDashboard";
    import SideBar from "../components/ui/base/SideBar";

    export default {
        name: 'Default',
        data(){
            return{
                componentName:'userDashboard',
            }
        },
        components: {
            SideBar,
            Login,
            Child,
            TopBar,
            UserDashboard,
        },
        computed:{
          ...mapGetters(['isAuthenticated'])
        },
        created() {
            console.log(this.isAuthenticated,"auth");
        }
    }
</script>
