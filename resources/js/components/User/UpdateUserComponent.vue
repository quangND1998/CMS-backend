<template>
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản lý Người Dùng
                            <small>> </small>
                        </h1>
                    </div>
                    {{get_user}}
                    <div
                    :class="['form-group m-1 p-3', error ? 'alert-danger' : '']"
                >
                    <span v-if="errors.username" class="label label-danger">
                        {{ errors.username[0] }}
                    </span>
                    <span v-if="errors.email" class="label label-danger">
                        {{ errors.email[0] }}
                    </span>
                    <span v-if="errors.password" class="label label-danger">
                        {{ errors.password[0] }}
                    </span>
                    <span v-if="errors.password_again" class="label label-danger">
                        {{ errors.password_again[0] }}
                    </span>
                      <span v-if="errors.account_type" class="label label-danger">
                        {{ errors.account_type[0] }}
                    </span>
                </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    
                        <form @submit.prevent="create()">
                       
                            <div class="form-group">
                                <p><label>Tên Người Dùng</label></p>
                                <input v-model="get_user.username" class="form-control input-width" type="text" name="username" placeholder="Nhập tên người dùng" value="" />
                            </div>

                            <div class="form-group">
                                <p><label>Email</label></p>
                                <input v-model="get_user.email"  class="form-control input-width" type="email" name="email" placeholder="Nhập địa chỉ Email" value="" readonly="" />
                            </div>

                            <div class="form-group">
                                <p><label>Bạn có muốn thay đổi mật khẩu?</label></p>
                                <p>
                                    <label class="radio-inline">
                                        <input   name="change_password" id="yes" class="radio-change" value="1"
                                         type="radio"><span for="yes">Có</span>
                                    </label>
                                    <label class="radio-inline">
                                        <input name="change_password" id="no" class="radio-change" value="0"
                                         type="radio" checked=""><span for="no">Không</span>
                                    </label>
                                </p>
                                <input v-model="get_user.password" class="form-control input-width disabled-field" type="password" name="password" placeholder="Nhập mật khẩu" disabled="" autocomplete="on" />
                            </div>

                            <div class="form-group">
                                <p><label>Xác nhận Mật khẩu</label></p>
                                <input v-model="get_user.password_again"  class="form-control input-width disabled-field" type="password" name="password_again" placeholder="Nhập lại mật khẩu" disabled="" autocomplete="on" />
                            </div>

                            <div class="form-group">
                                <p><label>Phân Quyền Tài Khoản</label></p>
                                <label class="radio-inline">
                                    <input name="account_type" value="0" v-model="get_user.account_type"
                                     type="radio">Tài khoản thường
                                </label>
                                <label class="radio-inline">
                                    <input name="account_type" value="1"   v-model="get_user.account_type"
                                     type="radio">Admin
                                </label>
                            </div>

                           <button type="submit" class="btn btn-success">
                            Thực Hiện
                        </button>
                        <router-link :to="{ name: 'user' }">
                            <button
                                type="reset"
                                class="btn btn-danger btn-mleft"
                            >
                                Hủy
                            </button>
                        </router-link>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
</template>

<script>
import { mapGetters } from "vuex";
import store from "../../components/store/store";
import {
    USER_EDIT,
    USER_RESET_STATE,GET_USER_ID
} from "../../components/store/userModule/action";

export default {
  mounted() {
        this.fetchUser();
    },
    props: {
        userId:{
            required:true
        }
    },
    data() {
        return {
            error: false,
            successful: false,
            errors: [],
       
        };
    },
    computed: {
        ...mapGetters(["get_user"])
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(USER_RESET_STATE);
        next();
    },
        methods: {
        create() {
            this.$store
                .dispatch(USER_EDIT,{slug:this.userId, data:this.get_user} )
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                    this.$router.push({ name: "user" });
                })
                .catch(error => {
                    // console.log(error);
                    if (!_.isEmpty(error.response)) {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                            this.successful = false;
                            this.error = true;
                        }
                    }
                });
        },
        fetchUser(){
            this.$store.dispatch(GET_USER_ID,this.userId);
        }
    }
}
</script>

<style>

</style>