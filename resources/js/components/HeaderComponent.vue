<template>
  <header class="app-header">
    <a class="app-header__logo"><img src="https://vni.pro.vn/landingpage/public/assets/images/vni/logo_vni.png" alt=""></a>
    <a class="app-sidebar__toggle" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search" />
            <button class="app-search__button">
                <i class="fa fa-search"></i>
            </button>
        </li>
        <li class="dropdown">
            <a class="app-nav__item"  data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">
                    You have 4 new notifications.
                </li>
                <div class="app-notification__content">
                    <li>
                        <a class="app-notification__item" href="javascript:;">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                    <i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p class="app-notification__message">
                                    Mail server not working
                                </p>
                                <p class="app-notification__meta">5 min ago</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="app-notification__item" href="javascript:;">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-success"></i>
                                    <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p class="app-notification__message">
                                    Transaction complete
                                </p>
                                <p class="app-notification__meta">2 days ago</p>
                            </div>
                        </a>
                    </li>
                </div>
                <li class="app-notification__footer">
                    <a href="javascript:void(0)">See all notifications.</a>
                </li>
            </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="javascript:void(0)" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user-o fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-cog fa-lg"></i> Settings</a>
                </li>
                <li>
                    <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-user fa-lg"></i> Profile</a>
                </li>
              
                <li>
                    <a class="dropdown-item" href="javascript:void(0)" @click.prevent="logout" >
                        <i class="fa fa-arrow-left"></i>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</header>
</template>

<script>


import { LOGOUT } from "./store/actions/login";
import { mapGetters } from "vuex";
import store from "./store/store";
export default {
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
            this.$store.dispatch(LOGOUT).then(response => {
              
                this.$router.push("/admin/login");
                setTimeout(() => {
                    this.$toast.success(
                        response,
                        {
                            position: "top-right",
                            duration: 2000
                        }
                    );
                }, 1300);
            }).catch(error =>{
               
                this.$router.push("/admin/login");  
            });
        }
    }

}
</script>
