<template>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Tin Tức
                    <small>> Danh Sách</small>
                </h1>
            </div>

            <table
                class="table table-striped table-bordered table-hover"
                style="width:100%"
                id="dataTables-example"
            >
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Hình</th>
                        <th class="text-center">Tiêu Đề Tin Tức</th>
                        <th class="text-center">Thể Loại</th>
                        <th class="text-center">Ngày tạo</th>
                        <th class="text-center">Lượt Xem</th>
                        <th class="text-center">Nổi Bật</th>
                        <th class="text-center">Sửa</th>
                        <th class="text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-if="news.length > 0"
                        v-for="(item, index) in news"
                        :key="item.id"
                        align="center"
                    >
                        <td>{{ index + 1 }}</td>
                        <td>
                            <img width="100px" :src="item.Hinh" />
                        </td>
                        <td>
                            <a href="#">{{ item.TieuDe }}</a>
                        </td>
                        <td>{{ binding(item.idLoaiTin) }}</td>
                        <td>{{ item.created_at }}</td>
                        <td></td>
                        <td>
                            {{ item.NoiBat }}
                        </td>
                        <td class="center">
                            <router-link
                                :to="{
                                    name: 'tintuc.update',
                                    params: { tintucId: item.id }
                                }"
                                class="btn btn-xs btn-info"
                            >
                                <i
                                    class="fa fa-pencil mr-0"
                                    aria-hidden="true"
                                ></i>
                            </router-link>
                        </td>
                        <td class="center">
                            <button
                                type="button"
                                @click="deleteNews(item.id)"
                                class="btn btn-xs btn-danger"
                            >
                                <i
                                    class="fa fa-trash mr-0"
                                    aria-hidden="true"
                                ></i>
                            </button>
                        </td>
                    </tr>
                    <tr v-else>
                        <td colspan="3">No data available in table</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.row -->

        <!-- /.container-fluid -->
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import store from "../../components/store/store";
import {
    FETCH_TIN_TUC,
    TIN_TUC_DELETE,
    TIN_TUC_RESET_STATE
} from "../../components/store/tintucModule/action";
import { FETCH_LOAI_TIN } from "../../components/store/loaitinmodule/action";
export default {
    created() {
        this.fetchNews();
        this.fetchTheLoai();
    },
    props: {
        msg: {}
    },
    computed: {
        ...mapGetters(["news", "loaitins"])
    },
    data() {
        return {};
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(TIN_TUC_RESET_STATE);
        next();
    },

    methods: {
        fetchNews() {
            this.$store.dispatch(FETCH_TIN_TUC);
        },
        deleteNews(id) {
            console.log(id);
            this.$store.dispatch(TIN_TUC_DELETE, id);
            this.fetchNews();
        },
        fetchTheLoai() {
            this.$store.dispatch(FETCH_LOAI_TIN);
        },
        binding(id) {
            for (let i = 0; i < this.loaitins.length; i++) {
                if (this.loaitins[i].id == id) {
                    return this.loaitins[i].Ten;
                }
            }
        }
    }
};
</script>

<style></style>
