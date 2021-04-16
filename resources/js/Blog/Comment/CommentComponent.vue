<template>
    <div id="posts">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách
                <small>> Bình luận người dùng</small>
            </h1>
        </div>

        <div class="col-md-12 px-0">
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nội dung</th>
                                <th>Tên Tin</th>
                                <th>Tên người dùng</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(comment, index) in comments"
                                :key="comment.id"
                            >
                                <td class="align-middle">{{ index + 1 }}</td>
                                <td class="align-middle">
                                    {{ comment.NoiDung }}
                                </td>

                                <td class="align-middle">
                                    {{ bindlingTinTuc(comment.idTinTuc) }}
                                </td>
                                <td class="align-middle">
                                    {{ bindlingUser(comment.idUser) }}
                                </td>

                                <td class="align-middle">
                                    <button
                                        type="button"
                                        @click="deleteComment(comment.id)"
                                        class="btn btn-xs btn-danger"
                                    >
                                        <i
                                            class="fa fa-trash mr-0"
                                            aria-hidden="true"
                                        ></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import store from "../../components/store/store";
import {
    FETCH_COMMENT,
    COMMENT_DELETE,
    COMMENT_RESET_STATE
} from "../../components/store/commentModule/action";
import { FETCH_TIN_TUC } from "../../components/store/tintucModule/action";
import { FETCH_USER } from "../../components/store/userModule/action";

export default {
    mounted() {
        this.fetchComment();
    },
    created() {
        this.fetchUsers();
        this.fetchNews();
    },
    props: {
        msg: {}
    },
    computed: {
        ...mapGetters(["comments", "news", "users"])
    },
    data() {
        return {};
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(COMMENT_RESET_STATE);
        next();
    },

    methods: {
        fetchComment() {
            this.$store.dispatch(FETCH_COMMENT);
        },
        fetchNews() {
            this.$store.dispatch(FETCH_TIN_TUC);
        },
        deleteComment(id) {
            this.$store.dispatch(COMMENT_DELETE, id);
            this.fetchComment();
        },
        fetchUsers() {
            this.$store.dispatch(FETCH_USER);
        },
        bindlingUser(id) {
            for (let j = 0; j < this.users.length; j++) {
                if (this.users[j].id == id) {
                    return this.users[j].username;
                }
            }
        },
        bindlingTinTuc(id) {
            for (let i = 0; i < this.news.length; i++) {
                if (this.news[i].id == id) {
                    return this.news[i].TieuDe;
                }
            }
        }
    }
};
</script>

<style></style>
