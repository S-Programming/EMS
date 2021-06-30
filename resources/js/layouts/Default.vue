<template>
    <div id="app">
        {{isAuthenticated}} humayon
        <TopBar v-if="isAuthenticated"/>
        <Child/>
<!--        <Login v-else/>-->
    </div>
</template>


<script>
    import TopBar from "../components/ui/base/TopBar";
    import Child from "../components/utilities/Child";
    import Login from "../pages/auth/Login";
    import {mapGetters} from 'vuex'

    export default {
        name: 'Default',
        components: {
            Login,
            Child,
            TopBar,
        },
        computed:{
          ...mapGetters(['isAuthenticated'])
        },
    }
</script>
