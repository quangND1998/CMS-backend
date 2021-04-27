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
                    <li class="breadcrumb-item">
                        Update
                    </li>
                </ul>
                <h1 class="mt-2">
                    <i class="fa fa-list-ul" aria-hidden="true"></i> Thể loại
                </h1>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form>
                        <div class="form-group">
                            <p><label>Tên Thể Loại</label></p>
                            <input
                                class="form-control input-width"
                                ref="Ten"
                                v-model="theloai.Ten"
                                name="cate_name"
                                placeholder="Nhập tên Thể Loại.."
                            />
                        </div>

                        <button
                            type="submit"
                            class="btn btn-success"
                            @click.prevent="update"
                        >
                            Sửa
                        </button>

                            <router-link
                                :to="{
                                    name: 'theloai'
                                }"
                            >
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
    THELOAI_RESET_STATE,
    THELOAI_PUBLISH,
    THELOAI_EDIT,
    GET_THELOAI_ID
} from "../../components/store/theloaimodule/action";
export default {
    mounted() {
        this.getTheloai();
    },
    props: {
        theloaiId: {
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
        ...mapGetters(["theloai"])
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(THELOAI_RESET_STATE);
        next();
    },
    methods: {
        update() {
            this.theloai.Ten = this.$refs.Ten.value;

            this.$store
                .dispatch(THELOAI_EDIT, {slug:this.theloaiId,data: this.theloai})
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                    this.$router.push({ name: "theloai" });
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
        },
        getTheloai() {
            this.$store.dispatch(GET_THELOAI_ID, this.theloaiId);
        }
    }
};
</script>

<style></style>
