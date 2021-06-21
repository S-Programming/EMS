<template>
    <div>
<!--        <TopBar></TopBar>-->
<!--<default> -&ndash;&gt; <top side footer>/child-->
<!--    -->
<!--</default>-->
<!--        <SideBar></SideBar>-->
<!--        <Login></Login>-->
        <router-view></router-view>
    </div>
</template>

<script>
import Login from "./pages/auth/Login";
import TopBar from "./components/ui/base/TopBar";
import SideBar from "./components/ui/base/SideBar";
export default {
    components: {SideBar, TopBar, Login},
    created() {
        console.log("haskdjhask")

    }
}
</script>
