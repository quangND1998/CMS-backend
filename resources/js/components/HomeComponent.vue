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
                    <a class="app-menu__item active" href="#">
                        <i
                            class="app-menu__icon fa fa-file-text-o"
                            aria-hidden="true"
                        ></i>
                        <span class="app-menu__label">Page list</span>
                    </a>
                </li>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"
                        ><i class="app-menu__icon fa fa-users"></i>
                        <span class="app-menu__label">Users</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item" href="#"
                                ><i class="icon fa fa-circle-o"></i> Admin
                                Users</a
                            >
                        </li>
                        <!-- <li>
                            <a
                                class="treeview-item"
                                href="#"
                                target="_blank"
                                rel="noopener noreferrer"
                                ><i class="icon fa fa-circle-o"></i> Roles</a
                            >
                        </li>
                        <li>
                            <a class="treeview-item" href="#"
                                ><i class="icon fa fa-circle-o"></i>
                                Permissions</a
                            >
                        </li> -->
                    </ul>
                </li>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview"
                        ><i class="fa fa-list fa-fw icon-mright"></i>
                        <span class="app-menu__label">Thể Loại</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a class="treeview-item" href="#"
                                ><i class="icon fa fa-circle-o"></i>Danh Sách</a
                            >
                        </li>
                        <!-- <li>
                            <a
                                class="treeview-item"
                                href="#"
                                target="_blank"
                                rel="noopener noreferrer"
                                ><i class="icon fa fa-circle-o"></i> Roles</a
                            >
                        </li>
                        <li>
                            <a class="treeview-item" href="#"
                                ><i class="icon fa fa-circle-o"></i>
                                Permissions</a
                            >
                        </li> -->
                    </ul>
                </li>
                <!-- <li>
                    <a class="app-menu__item" href="#"
                        ><i class="app-menu__icon fa fa-cogs"></i>
                        <span class="app-menu__label">Settings</span>
                    </a>
                </li> -->
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
