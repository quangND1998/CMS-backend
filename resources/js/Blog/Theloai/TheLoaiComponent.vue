<template>
    <div id="posts">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <li class="breadcrumb-item">
                        Thể loại
                    </li>
                </ul>
                <h1 class="mt-2">
                    <i class="fa fa-list-ul" aria-hidden="true"></i> Thể loại
                </h1>
            </div>
            <router-link
                :to="{ name: 'theloai.create' }"
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
                                <th>#</th>
                                <th>Tên thể loại</th>
                                <th>Tên không dấu</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(theloai, index) in theloais"
                                :key="theloai.id"
                            >
                                <td class="align-middle">{{ index + 1 }}</td>
                                <td class="align-middle">
                                    {{ theloai.Ten }}
                                </td>

                                <td class="align-middle">
                                    {{ theloai.TenKhongDau }}
                                </td>

                                <td class="align-middle">
                                    <router-link
                                        :to="{
                                            name: 'theloai.update',
                                            params: { theloaiId: theloai.id }
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
                                        @click="deleteTheLoai(theloai.id)"
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
    THELOAI_DELETE,
    FETCH_THELOAI,
    THELOAI_RESET_STATE
} from "../../components/store/theloaimodule/action";
export default {
    created() {
        this.fetchTheLoai();
    },
    props: {
        msg: {}
    },
    computed: {
        ...mapGetters(["theloais"])
    },
    data() {
        return {};
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(THELOAI_RESET_STATE);
        next();
    },

    methods: {
        fetchTheLoai() {
            this.$store.dispatch(FETCH_THELOAI);
        },
        deleteTheLoai(id) {
            this.$store.dispatch(THELOAI_DELETE, id);
            this.fetchTheLoai();
        }
    }
};
</script>

<style></style>
