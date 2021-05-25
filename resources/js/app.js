require('./bootstrap');
import Vue from 'vue'
import store from './components/store/store';
import router from './router/index'
// import HomeComponent from './components/HomeComponent'
import loginComponent from './components/Auth/loginComponent'
import jwtToken from './common/token'
// import LandingComponent from './components/landingpage/LandingComponent'

import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";
import VueLoading from 'vue-loading-template'
import UploadImages from "vue-upload-drop-images"




Vue.use(VueToast);
Vue.use(UploadImages)
Vue.use(VueLoading,{
    // color: "red",
    // loader: "dots",
    // width: 100,
    // height: 100,
    // backgroundColor: "#ffffff",
    // opacity: 0.5,
    // zIndex: 999,
})


const app = new Vue({
    el: '#app',
    components: {
   
    },
    router,
    store,
});



router.beforeEach((to, from, next) => {
    if (to.name !== 'login' && (jwtToken.getToken() == null)) next({ name: 'login' })
    else next()
})
