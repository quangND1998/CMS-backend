<template>
    <div id="posts">
        <div class="app-title">
            
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <li class="breadcrumb-item active">
                        <a
                            href="/admin/page/"
                            aria-current="page"
                            class="router-link-exact-active router-link-active"
                        >
                            News
                        </a>
                    </li>
                </ul>
                <h1 class="mt-2">
                    <i class="fa fa-sliders" aria-hidden="true"></i> News
                </h1>
            </div>
            <router-link
                :to="{ name: 'tintuc.create' }"
                class="btn btn-success"
            >
                ADD NEW
            </router-link>
        </div>

        <div></div>

        <div class="col-md-12 px-0">
            <div class="">
                <div class="table-responsive">
                    <table class="table">
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
                                v-for="(item, index) in news"
                                :key="item.id"
                                align="center"
                            >
                                <td>{{ index + 1 }}</td>
                                <td>
                                    <img width="100px" :src="item.Hinh" />
                                </td>
                                <td>
                                    <!-- tin-tuc/'+{{$item.TieuDeKhongDau}}+'.html -->
                                    <a :href="'tin-tuc/'+item.TieuDeKhongDau+'.html'">{{ item.TieuDe }}</a>
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
                        </tbody>
                    </table>
                </div>
            </div>
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
            // console.log(id);
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
