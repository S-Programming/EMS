<template>
    <div>
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header bg-white-5">
                <!-- Logo -->
                <a class="font-w600 text-dual" href="/">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
                    <span class="smini-hide font-size-h5 tracking-wider">
                <img :src=" ('assets/images/ks-logo.png') " alt="tag" width="120">
                        <!-- One<span class="font-w400">UI</span> -->
            </span>
                </a>
                <!-- END Logo -->

                <!-- Extra -->
                <div>
                    <!-- Options -->
                    <div class="dropdown d-inline-block ml-2">
                        <a class="btn btn-sm btn-dual" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="si si-drop"></i>
                        </a>
<!--                        <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">-->
<!--                            &lt;!&ndash; Color Themes &ndash;&gt;-->
<!--                            &lt;!&ndash; Layout API, functionality initialized in Template._uiHandleTheme() &ndash;&gt;-->
<!--                            <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="default" href="#">-->
<!--                                <span>Default</span>-->
<!--                                <i class="fa fa-circle text-default"></i>-->
<!--                            </a>-->
<!--                            <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="{{ asset('assets/css/themes/amethyst.css') }}" href="#">-->
<!--                                <span>Amethyst</span>-->
<!--                                <i class="fa fa-circle text-amethyst"></i>-->
<!--                            </a>-->
<!--                            <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="{{ asset('assets/css/themes/city.css') }}" href="#">-->
<!--                                <span>City</span>-->
<!--                                <i class="fa fa-circle text-city"></i>-->
<!--                            </a>-->
<!--                            <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="{{ asset('assets/css/themes/flat.css') }}" href="#">-->
<!--                                <span>Flat</span>-->
<!--                                <i class="fa fa-circle text-flat"></i>-->
<!--                            </a>-->
<!--                            <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="{{ asset('assets/css/themes/modern.css') }}" href="#">-->
<!--                                <span>Modern</span>-->
<!--                                <i class="fa fa-circle text-modern"></i>-->
<!--                            </a>-->
<!--                            <a class="dropdown-item d-flex align-items-center justify-content-between font-w500" data-toggle="theme" data-theme="{{ asset('assets/css/themes/smooth.css') }}" href="#">-->
<!--                                <span>Smooth</span>-->
<!--                                <i class="fa fa-circle text-smooth"></i>-->
<!--                            </a>-->
<!--                            &lt;!&ndash; END Color Themes &ndash;&gt;-->

<!--                            <div class="dropdown-divider"></div>-->

<!--                            &lt;!&ndash; Sidebar Styles &ndash;&gt;-->
<!--                            &lt;!&ndash; Layout API, functionality initialized in Template._uiApiLayout() &ndash;&gt;-->
<!--                            <a class="dropdown-item font-w500" data-toggle="layout" data-action="sidebar_style_light" href="#">-->
<!--                                <span>Sidebar Light</span>-->
<!--                            </a>-->
<!--                            <a class="dropdown-item font-w500" data-toggle="layout" data-action="sidebar_style_dark" href="#">-->
<!--                                <span>Sidebar Dark</span>-->
<!--                            </a>-->
<!--                            &lt;!&ndash; Sidebar Styles &ndash;&gt;-->

<!--                            <div class="dropdown-divider"></div>-->

<!--                            &lt;!&ndash; Header Styles &ndash;&gt;-->
<!--                            &lt;!&ndash; Layout API, functionality initialized in Template._uiApiLayout() &ndash;&gt;-->
<!--                            <a class="dropdown-item font-w500" data-toggle="layout" data-action="header_style_light" href="#">-->
<!--                                <span>Header Light</span>-->
<!--                            </a>-->
<!--                            <a class="dropdown-item font-w500" data-toggle="layout" data-action="header_style_dark" href="#">-->
<!--                                <span>Header Dark</span>-->
<!--                            </a>-->
<!--                            &lt;!&ndash; Header Styles &ndash;&gt;-->
<!--                        </div>-->
                    </div>
                    <!-- END Options -->

                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Extra -->
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
<!--                        {!! $menus??'' !!}-->
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                               aria-expanded="true" href="#">
                                <i class="nav-main-link-icon si si-bulb"></i>
                                <span class="nav-main-link-name">First Link</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="">
                                        <i class="nav-main-link-icon si si-cursor"></i>
                                        <span class="nav-main-link-name">Second link</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
    </div>
</template>

<script>
    export default {
        name: "SideBar"
    }
</script>

<style scoped>

</style>
