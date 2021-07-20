<template>
    <div id="app">
        <div v-if="isAuthenticated">
        <TopBar />
        <SideBar></SideBar>
        </div>
        <child></child>
<!--        <component v-bind:is="componentName"></component>-->
    </div>
</template>
<template>
    <event-nav-bar-u-i>
        <template v-slot:event-top-bar>
            <event-top-bar>
                <template v-slot:event-top-bar-actions>
                    <event-top-bar-actions/>
                </template>
            </event-top-bar>
        </template>
        <template v-slot:main-event-content class="main-content table-cell">
            <keep-alive>
                <component v-bind:is="currentStepComponent"></component>
            </keep-alive>
        </template>
    </event-nav-bar-u-i>
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
