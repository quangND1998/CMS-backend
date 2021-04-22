<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Quản lý Người Dùng
                        <small>> Thêm Người Dùng</small>
                    </h1>
                </div>

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
                    <span
                        v-if="errors.password_again"
                        class="label label-danger"
                    >
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
                            <input
                                ref="username"
                                class="form-control input-width"
                                type="text"
                                name="username"
                                placeholder="Nhập tên người dùng"
                            />
                        </div>

                        <div class="form-group">
                            <p><label>Email</label></p>
                            <input
                                ref="email"
                                class="form-control input-width"
                                type="email"
                                name="email"
                                placeholder="Nhập địa chỉ Email"
                            />
                        </div>

                        <div class="form-group">
                            <p><label>Mật khẩu</label></p>
                            <input
                                ref="password"
                                class="form-control input-width"
                                type="password"
                                name="password"
                                placeholder="Nhập mật khẩu"
                                autocomplete 
                            />
                        </div>

                        <div class="form-group">
                            <p><label>Xác nhận Mật khẩu</label></p>
                            <input
                                ref="password_again"
                                class="form-control input-width"
                                type="password"
                                name="password_again"
                                placeholder="Nhập lại mật khẩu"
                                autocomplete 
                            />
                        </div>

                        <div class="form-group">
                            <p><label>Phân Quyền Tài Khoản</label></p>
                            <label class="radio-inline">
                                <input
                                    v-model="get_user.account_type"
                                    name="account_type"
                                    value="0"
                                    checked=""
                                    type="radio"
                                />Tài khoản thường
                            </label>
                            <label class="radio-inline">
                                <input
                                    v-model="get_user.account_type"
                                    name="account_type"
                                    value="1"
                                    type="radio"
                                />Admin
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
    CREATE_USER,
    USER_RESET_STATE
} from "../../components/store/userModule/action";

export default {
    created() {},
    props: {},
    data() {
        return {
            error: false,
            successful: false,
            errors: []
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
            this.get_user.username = this.$refs.username.value;
            this.get_user.email = this.$refs.email.value;
            this.get_user.password = this.$refs.password.value;
            this.get_user.password_again = this.$refs.password_again.value;

            this.$store
                .dispatch(CREATE_USER, this.get_user)
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
        }
    }
};
</script>

<style></style>
