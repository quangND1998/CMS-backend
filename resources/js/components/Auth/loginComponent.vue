<template>

<div>
    <section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    
     <div v-if="data.errors" :class="['form-group m-1 p-3', data.errors ? 'alert alert-danger alert-dismissible fade show' : '']" role="alert">
          <strong>Opps !!!</strong> {{data.errors}}.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <div class="logo">
        <h1></h1>
    </div>
    <div class="login-box">
   
        <form  @submit.prevent="login()" class="login-form"   role="form">
     
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label class="control-label" for="email">Email Address</label>
                <input class="form-control" v-model="user.email" type="email" id="email" name="email" placeholder="Email address" autofocus value="">
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input class="form-control" v-model="user.password"  type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox" name="remember"><span class="label-text">Stay Signed in</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group btn-container">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
              
        </form>
    </div>
</section>
</div>
</template>

<script>
import {mapGetters} from 'vuex'
import store from '../store/store';
import {LOGIN,LOGOUT, CHECK_AUTH} from '../store/actions/login';
import { PAGE_RESET_STATE } from '../store/actions/page';
import jwtToken from '../../common/token'
export default {
    name:'login-component',
    data (){
        return {

        };
    },
       computed: {
          ...mapGetters(["user","isAuthenticated","msg",'data'])
       },
         async beforeRouteLeave(to, from, next) {
        await store.dispatch(PAGE_RESET_STATE);
        next();
      },

       methods: {

              login(){
                 this.$store.dispatch(LOGIN,{email:this.user.email,password:this.user.password})
                 .then(() => this.$router.push({ name: "index" ,params: { msg : this.msg } }));
           }
         
       },
 
   
    


}
</script>

<style>

</style>