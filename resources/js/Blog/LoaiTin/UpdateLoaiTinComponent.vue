<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Loại Tin
                        <small>> Update</small>
                    </h1>
                </div>
                <div
                    :class="['form-group m-1 p-3', error ? 'alert-danger' : '']"
                >
                    <span v-if="errors.Ten" class="label label-danger">
                        {{ errors.Ten[0] }}
                    </span>
                    <span v-if="errors.theloai_id" class="label label-danger">
                        {{ errors.theloai_id[0] }}
                    </span>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    {{ loaitin }}

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
                                v-model="loaitin.Ten"
                                ref="Ten"
                                placeholder="Nhập Tên Loại Tin.."
                            />
                        </div>

                        <button
                            type="submit"
                            class="btn btn-success"
                            @click.prevent="update"
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
    LOAI_TIN_EDIT,
    GET_LOAI_TIN_ID,
    LOAI_TIN_RESET_STATE
} from "../../components/store/loaitinmodule/action";
import { FETCH_THELOAI } from "../../components/store/theloaimodule/action";
export default {
    created() {
        this.fetchTheLoai();
        this.getLoaiTinID();
    },
    props: {
        loaitinId: {
            required: true
        }
    },
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
        update() {
            this.$store
                .dispatch(LOAI_TIN_EDIT, {
                    slug: this.loaitinId,
                    data: this.loaitin
                })
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                    this.$router.push({ name: "loaitin" });
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
        fetchTheLoai() {
            this.$store.dispatch(FETCH_THELOAI);
        },
        getLoaiTinID() {
            this.$store.dispatch(GET_LOAI_TIN_ID, this.loaitinId);
        }
    }
};
</script>

<style></style>
