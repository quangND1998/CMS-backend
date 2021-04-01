
require('./bootstrap');

import Vue from 'vue'
import store from './components/store/store';
import router from './router/index'
import HomeComponent from './components/HomeComponent'
import loginComponent from './components/Auth/loginComponent'
import jwtToken from './common/token'

const app = new Vue({
        el: '#app',
        components: {HomeComponent  },
        router,
        store,
  
});
router.beforeEach((to, from, next) => {
       if (to.name !== 'login' && (jwtToken.getToken()==null)) next({ name: 'login' })
  else next()


})
