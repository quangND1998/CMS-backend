<template>
    <div id="posts">


        <div class="col-md-12 px-0">
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên Thể Loại</th>
                                <th>Tên Không Dấu</th>
                                 <th>Tên Thể loại</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(loaitin, index) in loaitins"
                                :key="loaitin.id"
                            >
                                <td class="align-middle">{{ index + 1 }}</td>
                                <td class="align-middle">
                                    {{ loaitin.Ten }}
                                </td>

                                <td class="align-middle">
                                    {{ loaitin.TenKhongDau }}
                                </td>
                                <td class="align-middle">
                                    {{ binding(loaitin.theloai_id) }}
                                </td>

                                <td class="align-middle">
                                    <router-link
                                        :to="{
                                            name: 'loaitin.update',
                                            params: { loaitinId: loaitin.id }
                                        }"
                                        class="btn btn-xs btn-info"
                                    >
                                        <i
                                            class="fa fa-pencil mr-0"
                                            aria-hidden="true"
                                        ></i>
                                    </router-link>
                                    <button
                                        type="button"
                                        @click="deleteLoaiTin(loaitin.id)"
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
    LOAI_TIN_DELETE,
    FETCH_LOAI_TIN,
    LOAI_TIN_RESET_STATE
} from "../../components/store/loaitinmodule/action";
import { FETCH_THELOAI } from "../../components/store/theloaimodule/action";
export default {
    mounted() {
        this.fetchLoaiTin();
    },
    created() {
        this.fetchTheLoai();
    },
    props: {
        msg: {}
    },
    computed: {
        ...mapGetters(["loaitins", "theloais"])
    },
    data() {
        return {};
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(LOAI_TIN_RESET_STATE);
        next();
    },

    methods: {
        fetchLoaiTin() {
            this.$store.dispatch(FETCH_LOAI_TIN);
        },
        deleteLoaiTin(id) {
            this.$store.dispatch(LOAI_TIN_DELETE, id);
            this.fetchLoaiTin();
        },
        fetchTheLoai() {
            this.$store.dispatch(FETCH_THELOAI);
        },
        binding(id) {
   
            for (let i = 0; i < this.theloais.length; i++) {
                if (this.theloais[i].id == id) {
                    return this.theloais[i].Ten;
                }
            }
        }
    }
};
</script>

<style></style>
