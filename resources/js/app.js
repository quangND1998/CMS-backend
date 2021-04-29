require('./bootstrap');
import CKEditor from 'ckeditor4-vue';
import Vue from 'vue'
import store from './components/store/store';
import router from './router/index'
import HomeComponent from './components/HomeComponent'
import loginComponent from './components/Auth/loginComponent'
import jwtToken from './common/token'
import LandingComponent from './components/landingpage/LandingComponent'

import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";



const app = new Vue({
    el: '#app',
    components: { HomeComponent, LandingComponent },
    router,
    store,
});

Vue.use(CKEditor);
Vue.use(VueToast);

router.beforeEach((to, from, next) => {
    if (to.name !== 'login' && (jwtToken.getToken() == null)) next({ name: 'login' })
    else next()
})