<template>
    <div id="app">
        <TopBar v-if="isAuthenticated"/>
        <child></child>
<!--        <component v-bind:is="componentName"></component>-->
    </div>
</template>


<script>
    import TopBar from "../components/ui/base/TopBar";
    import Child from "../components/utilities/Child";
    import Login from "../pages/auth/Login";
    import {mapGetters} from 'vuex'
    import UserDashboard from "../components/users/UserDashboard";

    export default {
        name: 'Default',
        data(){
            return{
                componentName:'userDashboard',
            }
        },
        components: {
            Login,
            Child,
            TopBar,
            UserDashboard,
        },
        computed:{
          ...mapGetters(['isAuthenticated'])
        },
        created() {
            console.log("ASDasdasdsadasdassadasd");
        }
    }
</script>
