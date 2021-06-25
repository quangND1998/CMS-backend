<template>
    <div  :style="[isLoading ? { opacity: 0.5, zIndex: 999, backgroundColor: '#ffffff',} :'']"  >
           
        <section class="material-half-bg">
            <div class="cover"></div>
        </section>
        <section class="login-content">
            <div class="logo">
                <h1></h1>
            </div>
            <div class="login-box">
             <vue-loading v-if ="isLoading"  type="spiningDubbles"  color="#d9544e" :size="{ width: '64px', height: '64px' }" :style="[isLoading ? {zIndex: -1,opacity: 999}:'']"></vue-loading>   
                <form
                    @submit.prevent="login()"
                    class="login-form"
                    ref="formContainer"
                    role="form"
                >
                    <h3 class="login-head">
                        <i class="fa fa-lg fa-fw fa-user"></i>SIGN IN
                    </h3>
                    <div class="form-group">
                        <label class="control-label" for="email"
                            >Email Address</label
                        >
                        <input
                            class="form-control"
                            ref="email"
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Email address"
                            autofocus
                            value=""
                        />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password"
                            >Password</label
                        >
                        <input
                            class="form-control"
                            v-model="auth.password"
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Password"
                            autocomplete 
                        />
                    </div>
                    <div class="form-group">
                        <div class="utility">
                            <div class="animated-checkbox">
                                <label>
                                    <input
                                        type="checkbox"
                                        name="remember"
                                    /><span class="label-text"
                                        >Stay Signed in</span
                                    >
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group btn-container">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import store from "../store/store";
import { LOGIN, LOGOUT, CHECK_AUTH } from "../store/actions/login";
import { PAGE_RESET_STATE } from "../store/actions/page";
import jwtToken from "../../common/token";

export default {
    name: "logincomponent",
    data() {
        return {
            isLoading:false,
            fullPage: false
        };
    },
    computed: {
        ...mapGetters(["auth", "isAuthenticated", "msg", "data"])
    },
    async beforeRouteLeave(to, from, next) {
        await store.dispatch(PAGE_RESET_STATE);
        next();
    },
    methods: {
        login() {
            // let loader = this.$loading.show({
            //     // Optional parameters
            //     container: this.fullPage ? null : this.$refs.formContainer,
            //     canCancel: true,
            //     onCancel: this.onCancel
            // });
            this.$store
                .dispatch(LOGIN, {
                    email: this.$refs.email.value,
                    password: this.auth.password
                })
                .then(response => {
                    this.isLoading = true

                    setTimeout(() => {
                        // loader.hide();
                        this.isLoading = false
                        this.$toast.success(response.msg, {
                            position: "bottom-right",
                            duration: 2000
                        });
                        this.$router.push({
                            name: "index",
                            params: { msg: this.msg }
                        });
                    }, 2000);
                })
                .catch(error => {

                    // console.log(error.data)
                    this.isLoading = true
                    if (!_.isEmpty(error.data)) {
                        setTimeout(() => {
                               this.isLoading = false
                            this.$toast.warning(error.data.errors, {
                                position: "top-right",
                                duration: 3000
                            });
                        }, 1000);
                    }
                });
        }
    }
};
</script>

<style></style>
