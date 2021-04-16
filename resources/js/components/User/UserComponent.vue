<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Quản lý Người Dùng
                        <small>> Danh Sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->

                <div class="col-md-12 px-0">
                    <div class="">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr align="center">
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Tên</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Quyền</th>
                                        <th class="text-center">Ngày Tạo</th>
                                        <th class="text-center">Sửa</th>
                                        <th class="text-center">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(user, index) in users"
                                        :key="user.id"
                                        class="odd gradeX"
                                        align="center"
                                    >
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ user.username }}</td>
                                        <td>{{ user.email }}</td>
                                        <td v-if="user.account_type == 1">
                                            Admin
                                        </td>
                                        <td v-else>Tài khoản thường</td>
                                        <td>{{ user.created_at }}</td>
                                        <td class="center">
                                            <router-link
                                                :to="{
                                                    name: 'user.update',
                                                    params: { userId: user.id }
                                                }"
                                            >
                                                <i
                                                    class="fa fa-pencil fa-fw"
                                                ></i>
                                                <a href="#">Sửa</a></router-link
                                            >
                                        </td>
                                        <td class="center">
                                            <i class="fa fa-trash-o  fa-fw"></i>
                                            <input type="hidden" value="" />

                                            <a
                                                class="btnDel"
                                                data-backdrop="static"
                                                data-keyboard="false"
                                                data-toggle="modal"
                                                :data-target="
                                                    '#myModal' + user.id
                                                "
                                                >Xóa</a
                                            >

                                            <div
                                                style="text-align: left;"
                                                :id="'myModal' + user.id"
                                                class="modal fade"
                                                role="dialog"
                                            >
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div
                                                            class="modal-header"
                                                        >
                                                            <h4
                                                                class="modal-title"
                                                            >
                                                                Xác Nhận
                                                            </h4>
                                                            <button
                                                                type="button"
                                                                class="close"
                                                                data-dismiss="modal"
                                                            >
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                <strong
                                                                    >Người Dùng
                                                                    "{{
                                                                        user.username
                                                                    }}" bình
                                                                    luận trong
                                                                    các bài
                                                                    viết.</strong
                                                                >
                                                            </p>
                                                            <p>
                                                                Bạn có chắc chắn
                                                                muốn xóa Người
                                                                Dùng: "{{
                                                                    user.username
                                                                }}" không?
                                                            </p>
                                                        </div>
                                                        <div
                                                            class="modal-footer"
                                                        >
                                                            <button
                                                                type="button"
                                                                data-casetype="user"
                                                                data-dismiss="modal"
                                                                class="btn btn-default btnConf"
                                                                @click="
                                                                    deleteUser(
                                                                        user.id
                                                                    )
                                                                "
                                                            >
                                                                Có
                                                            </button>
                                                            <button
                                                                type="button"
                                                                class="btn btn-default"
                                                                data-dismiss="modal"
                                                            >
                                                                Không
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
    FETCH_USER,
    USER_DELETE,
    USER_RESET_STATE
} from "../../components/store/userModule/action";
export default {
    created() {
        this.getUsers();
    },
    computed: {
        ...mapGetters(["users"])
    },
    async beforeRouteLeave(to, from, next) {
        await store.dispatch(USER_RESET_STATE);
        next();
    },

    data() {
        return {};
    },

    methods: {
        getUsers() {
            this.$store.dispatch(FETCH_USER);
        },
        deleteUser(id) {
            this.$store.dispatch(USER_DELETE, id);
            this.getUsers();
        }
    }
};
</script>

<style></style>
