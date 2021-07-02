<!--<template>-->
<!--    <div>-->
<!--&lt;!&ndash;        <TopBar></TopBar>&ndash;&gt;-->
<!--&lt;!&ndash;<default> -&ndash;&gt; <top side footer>/child&ndash;&gt;-->
<!--&lt;!&ndash;    &ndash;&gt;-->
<!--&lt;!&ndash;</default>&ndash;&gt;-->
<!--&lt;!&ndash;        <SideBar></SideBar>&ndash;&gt;-->
<!--&lt;!&ndash;        <Login></Login>&ndash;&gt;-->
<!--        <router-view></router-view>-->
<!--    </div>-->
<!--</template>-->
<template>
    <div id="app">
<!--        <Loading ref="loading" />-->
        <transition name="page" mode="out-in">
            <component :is="defaultLayout" v-if="defaultLayout" />
        </transition>
    </div>
</template>

<script>
    // import Loading from '~/components/utilities/Loading'
    import Default from "./layouts/Default";
    export default {
        name: "app",
        components: {
            Default
            // Loading

        },
        data: () => ({
            // layout: null,
            defaultLayout: 'Default'
        }),
        created() {
            console.log("ASDasdasdas");
        }
        // mounted() {
        //     this.$loading = this.$refs.loading
        // },
        // methods: {
        //     /**
        //      * Set the application layout.
        //      *
        //      * @param {String} layout
        //      */
        //     setLayout(layout) {
        //         if (!layout || !layouts[layout]) {
        //             layout = this.defaultLayout
        //         }
        //
        //         this.layout = layouts[layout]
        //     }
        // }
    }
</script>
