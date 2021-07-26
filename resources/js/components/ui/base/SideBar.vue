<template>
    <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll  main-content-narrow">
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header bg-white-5">
                <!-- Logo -->
                <a class="font-w600 text-dual" href="/">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
                    <span class="smini-hide font-size-h5 tracking-wider">
<!--                <img :src=" ('assets/images/ks-logo.png') " alt="tag" width="120">-->
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
                    </div>
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
                            <a class="nav-main-link active" href="gs_backend.html">
                                <i class="nav-main-link-icon si si-speedometer"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Heading</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon si si-puzzle"></i>
                                <span class="nav-main-link-name">Dropdown</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="javascript:void(0)">
                                        <span class="nav-main-link-name">Link #1</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="javascript:void(0)">
                                        <span class="nav-main-link-name">Link #2</span>
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
        name: "SideBar",
        data () {
            return {
                menus: [],
            }
        },
        created() {
            menus = menuRole();
            menus = sidebarHtml(menus);
        },
        methods:{
            sidebarHtml(menus = []){
                $html = '';
                // if ((menus) && count(menus) > 0) {
                    forEach (menu in menus) {
                        subMenus = menuRole(['parent_id' => (menu['menu_id'] || 0)]);
                        if (subMenus && subMenus !='') {
                            innerHtml = sidebarHtml(subMenus);
                            if (innerHtml != '') {
                                $html .= view('utils._partial.parent_menus', ['data' => ($menu['menu'] ?? []), 'inner_html' => $innerHtml])->render();
                            }
                        } else {
                            $html .= view('utils._partial.menu', ['data' => ($menu['menu'] ?? [])])->render();
                        }
                    }
                // }
                return $html;
            }
        },
        menuRole(requestData = [])
        {
            parentId = requestData['parent_id'] || 0;
            parentMenus = MenuRole::with('menu')->whereIn('role_id', $this->userRoles())->whereHas('menu', function ($query) use ($parentId) {
            query->where('parent_id', $parentId); // Api Hit
        })->get();
            return parentMenus ? parentMenus->toArray() : []; // in js array
        },
    }
</script>

<style scoped>

</style>
