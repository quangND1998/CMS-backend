<template>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Thể Loại
                        <small>> Thêm</small>
                    </h1>
                </div>
                <div
                    :class="['form-group m-1 p-3', error ? 'alert-danger' : '']"
                >
                    <span v-if="errors.Ten" class="label label-danger">
                        {{ errors.Ten[0] }}
                    </span>
                   
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form>
                        <div class="form-group">
                            <p><label>Tên Thể Loại</label></p>
                            <input
                                class="form-control input-width"
                                ref="Ten"
                                name="cate_name"
                                placeholder="Nhập tên Thể Loại.."
                            />
                        </div>

                        <button
                            type="submit"
                            class="btn btn-default"
                            @click.prevent="create"
                        >
                            Thêm
                        </button>

                        <button type="reset" class="btn btn-default btn-mleft">
                            Nhập Lại
                        </button>
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
    THELOAI_DELETE,
    FETCH_THELOAI,
    THELOAI_RESET_STATE,
    THELOAI_PUBLISH
} from "../../components/store/theloaimodule/action";
export default {
    props: {},
    data() {
        return {
            error: false,
            successful: false,
            errors: []
        };
    },
    computed: {
        ...mapGetters(["theloai"])
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(THELOAI_RESET_STATE);
        next();
    },
    methods: {
        create() {
            this.theloai.Ten = this.$refs.Ten.value;

            this.$store
                .dispatch(THELOAI_PUBLISH, this.theloai)
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                    this.$router.push({ name: "theloai" });
                })
                .catch(error => {
                    console.log(error);
                    if (!_.isEmpty(error.response)) {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                            this.successful = false;
                            this.error = true;
                        }
                    }
                });

            // axios
            //   .post("/api/page", formData)
            //   .then(response => {
            //     this.successful = true;
            //     this.error = false;
            //     this.errors = [];
            //     this.$router.push({name:'page'});
            //   })
            //   .catch(error => {
            //     if (!_.isEmpty(error.response)) {
            //       if ((error.response.status == 422)) {
            //         this.errors = error.response.data.errors;
            //         this.successful = false;
            //         this.error = true;
            //       }
            //     }
            //   });
        }
    }
};
</script>

<style></style>
