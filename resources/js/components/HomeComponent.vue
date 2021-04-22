<template>
    <div class="app sidebar-mini rtl">
        <header-component></header-component>

        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">
            <div class="app-sidebar__user">
                <div class="mx-auto">
                    <p class="app-sidebar__user-name">Admin VNi</p>
                    <p class="app-sidebar__user-designation">
                        Administrator
                    </p>
                </div>
            </div>
            <ul class="app-menu">
                <li>
                    <router-link :to="{ name: 'page' }">
                        <a class="app-menu__item active" href="#">
                            <i
                                class="app-menu__icon fa fa-file-text-o"
                                aria-hidden="true"
                            ></i>
                            <span class="app-menu__label">Page list</span>
                        </a>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'theme' }">
                        <a class="app-menu__item active" href="#">
                            <i
                                class="app-menu__icon fa fa-file-text-o"
                                aria-hidden="true"
                            ></i>

                            <span class="app-menu__label">Theme</span>
                        </a>
                    </router-link>
                </li>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"
                        ><i class="app-menu__icon fa fa-users"></i>
                        <span class="app-menu__label">Users</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <router-link :to="{ name: 'user' }" >

                               <li>
                            <a class="treeview-item" href="#"
                                ><i class="icon fa fa-circle-o"></i> Admin
                                Users</a
                            >
                        </li>
                        </router-link>
                           <router-link :to="{ name: 'user.create' }">
                            <li>
                                <a class="treeview-item" href="#"
                                    ><i class="icon fa fa-circle-o"></i>Thêm User</a
                                >
                            </li>
                        </router-link>

                        <!-- <li>
                            <a
                                class="treeview-item"
                                href="table-data-table.html"
                                ><i class="icon fa fa-circle-o"></i> Data
                                Tables</a
                            >
                        </li> -->
                    </ul>
                </li>

                <!-- Thể Loại -->
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"
                        ><i class="fa fa-list fa-fw icon-mright"></i>
                        <span class="app-menu__label">Thể Loại</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <router-link :to="{ name: 'theloai' }">
                            <li>
                                <a class="treeview-item" href="#"
                                    ><i class="icon fa fa-circle-o"></i>Danh
                                    Sách</a
                                >
                            </li>
                        </router-link>
                        <router-link :to="{ name: 'theloai.create' }">
                            <li>
                                <a class="treeview-item" href="#"
                                    ><i class="icon fa fa-circle-o"></i>Thêm Thể
                                    Loại</a
                                >
                            </li>
                        </router-link>
                    </ul>
                </li>
                <!-- <li>
                    <a class="app-menu__item" href="#"
                        ><i class="app-menu__icon fa fa-cogs"></i>
                        <span class="app-menu__label">Settings</span>
                    </a>
                </li> -->

                <!-- Loai TIn -->
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"
                        ><i class="fa fa-tasks fa-fw icon-mright"></i>
                        <span class="app-menu__label">Loại Tin</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <router-link :to="{ name: 'loaitin' }">
                            <li>
                                <a class="treeview-item"
                                    ><i class="icon fa fa-circle-o"></i>Danh
                                    Sách</a
                                >
                            </li>
                        </router-link>
                        <router-link :to="{ name: 'loaitin.create' }">
                            <li>
                                <a class="treeview-item"
                                    ><i class="icon fa fa-circle-o"></i>Thêm
                                    Loại Tin</a
                                >
                            </li>
                        </router-link>
                    </ul>
                </li>

                <!-- Tin Tức -->
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"
                        ><i class="fa fa-newspaper-o fa-fw icon-mright"></i>
                        <span class="app-menu__label">Tin Tức</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <router-link :to="{ name: 'tintuc' }">
                            <li>
                                <a class="treeview-item" href="#"
                                    ><i class="icon fa fa-circle-o"></i>Danh
                                    Sách</a
                                >
                            </li>
                        </router-link>
                        <router-link :to="{ name: 'tintuc.create' }">
                            <li>
                                <a class="treeview-item" href="#"
                                    ><i class="icon fa fa-circle-o"></i>Thêm Tin
                                    Tức</a
                                >
                            </li>
                        </router-link>
                    </ul>
                </li>

                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"
                        ><i class="fa fa-slideshare fa-fw icon-mright"></i>
                        <span class="app-menu__label">Quản lý Slider</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                     <router-link :to="{ name: 'slide' }">
                            <li>
                                <a class="treeview-item" href="#"
                                    ><i class="icon fa fa-circle-o"></i>Danh
                                    Sách</a
                                >
                            </li>
                        </router-link>
                           <router-link :to="{ name: 'slide.create' }">
                             <li>
                            <a class="treeview-item" href="#"
                                ><i class="icon fa fa-circle-o"></i>Thêm Slide
                            </a>
                        </li>
                        </router-link>

                    </ul>
                </li>

                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"
                        ><i class="fa fa-slideshare fa-fw icon-mright"></i>
                        <span class="app-menu__label">Contact</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <router-link :to="{ name: 'contact' }">
                            <li>
                                <a class="treeview-item" href="#"
                                    ><i class="icon fa fa-circle-o"></i>Danh
                                    Sách</a
                                >
                            </li>
                        </router-link>

                    </ul>
                </li>
                    <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"
                        ><i class="fa fa-users fa-fw icon-mright"></i>
                        <span class="app-menu__label">Comment</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <router-link :to="{ name: 'comment' }">
                            <li>
                                <a class="treeview-item" href="#"
                                    ><i class="icon fa fa-circle-o"></i>Danh
                                    Sách</a
                                >
                            </li>
                        </router-link>

                    </ul>
                </li>

                <li>
                    <a class="app-menu__item" href="#" @click.prevent="logout"
                        ><i class="app-menu__icon fa fa-sign-out"></i>
                        <span class="app-menu__label">Logout</span>
                    </a>
                </li>
            </ul>
        </aside>
        <main id="app" class="app-content">
            <!-- <router-link :to="{ name: 'page' }">
                List Page
            </router-link> -->

            <div>
                <!-- <transition name="slide"> -->
                <router-view></router-view>
                <!-- </transition> -->
            </div>
        </main>
    </div>
</template>

<script>
import HeaderComponent from "./HeaderComponent";

import { LOGOUT } from "./store/actions/login";
import { mapGetters } from "vuex";
import store from "./store/store";
export default {
    name: "home-component",
    components: { HeaderComponent },
    data() {
        return {
            title: 0
        };
    },
    computed: {
        ...mapGetters(["isAuthenticated"])
    },
    //  beforeRouteEnter (to, from, next) {
    //   if(this.isAuthenticated ===undefined){

    //          next(false)
    //     }
    //     else{
    //         next()

    //     }
    // },

    methods: {
        logout() {
            this.$store.dispatch(LOGOUT);
            this.$router.push("/admin/login");
        }
    }
};
</script>
>
<style scoped>
@import url(
    https://fonts.googleapis.com/css?family=Dosis:300|Lato:300,
    400,
    600,
    700|Roboto+Condensed:300,
    700|Open+Sans+Condensed:300,
    600|Open+Sans:400,
    300,
    600,
    700|Maven+Pro:400,
    700
);
@import url("https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css");
* {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
header {
    color: #d3d3d3;
}
nav {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 82%;
    left: 0;
    padding: 22px;
    border-right: 2px solid #161e23;
}
nav > header {
    font-weight: 700;
    font-size: 0.8rem;
    text-transform: uppercase;
}
nav section {
    font-weight: 600;
}
nav section header {
    padding-top: 30px;
}
nav section ul {
    list-style: none;
    padding: 0px;
}
nav section ul a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}
article {
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    left: 18%;
    overflow: auto;
    border-left: 2px solid #2a3843;
    padding: 20px;
}
article > header {
    height: 60px;
    border-bottom: 1px solid #2a3843;
}
.slide-leave-active {
    transition: opacity 0.51s ease;
    opacity: 0;
    animation: slide-out 0.5s ease-out forwards;
}
.slide-leave {
    opacity: 1;
    transform: translateX(0);
}
@keyframes slide-out {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(50px);
    }
}
</style>
