<template>
    <div id="posts">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <li class="breadcrumb-item active">
                        Loại tin
                    </li>
                    <li class="breadcrumb-item active">
                        Add new
                    </li>
                </ul>
                <h1 class="mt-2">
                    <i class="fa fa-tags" aria-hidden="true"></i> Loại tin
                </h1>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1"
                                >Chọn Thể Loại</label
                            >
                            <select
                                class="form-control"
                                id="exampleFormControlSelect1"
                                v-model="loaitin.theloai_id"
                            >
                                <option
                                    v-for="theloai in theloais"
                                    :key="theloai.index"
                                    v-bind:value="theloai.id"
                                    >{{ theloai.Ten }}</option
                                >
                            </select>
                        </div>
                        <div class="form-group">
                            <p><label>Tên Loại Tin</label></p>
                            <input
                                class="form-control input-width"
                                ref="Ten"
                                placeholder="Nhập Tên Loại Tin.."
                            />
                        </div>
                        <button
                            type="submit"
                            class="btn btn-success"
                            @click.prevent="create"
                        >
                            Thêm
                        </button>
                        <router-link :to="{ name: 'loaitin' }">
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
    LOAI_TIN_PUBLISH,
    LOAI_TIN_RESET_STATE
} from "../../components/store/loaitinmodule/action";
import { FETCH_THELOAI } from "../../components/store/theloaimodule/action";
export default {
    created() {
        this.fetchTheLoai();
    },
    props: {},
    data() {
        return {
            error: false,
            successful: false,
            errors: []
        };
    },
    computed: {
        ...mapGetters(["theloais", "loaitin"])
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(LOAI_TIN_RESET_STATE);
        next();
    },
    methods: {
        create() {
            this.loaitin.Ten = this.$refs.Ten.value;

            this.$store
                .dispatch(LOAI_TIN_PUBLISH, this.loaitin)
                .then(response => {
                    setTimeout(() => {
                        this.$toast.success("Add new Loai Tin successfully", {
                            position: "bottom-right",
                            duration: 2000
                        });
                    }, 1000);
                    this.$router.push({ name: "loaitin" });
                })
                .catch(error => {
                  
                    if (error.response.data.errors.Ten) {
                        setTimeout(() => {
                            this.$toast.error(
                                error.response.data.errors.Ten[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 2000);
                    }
                    if (error.response.data.errors.theloai_id) {
                        setTimeout(() => {
                            this.$toast.error(
                                error.response.data.errors.theloai_id[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 1000);
                    }
                });
        },
        fetchTheLoai() {
            this.$store.dispatch(FETCH_THELOAI);
        }
    }
};
</script>

<style></style>
