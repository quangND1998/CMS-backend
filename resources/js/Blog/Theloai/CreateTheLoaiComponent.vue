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
                        Add new
                    </li>
                </ul>
                <h1 class="mt-2">
                    <i class="fa fa-list-ul" aria-hidden="true"></i> Thể loại
                </h1>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" style="padding-bottom:120px">
                    <form>
                        <div class="form-group">
                            <p><label>Tên thể loại</label></p>
                            <input
                                class="form-control input-width"
                                ref="Ten"
                                name="cate_name"
                                placeholder="Nhập tên thể loại.."
                                required
                            />
                        </div>
                        <button
                            type="submit"
                            class="btn btn-success"
                            @click.prevent="create"
                        >
                            Thêm
                        </button>
                        <router-link :to="{ name: 'theloai' }">
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
                    setTimeout(() => {
                        this.$toast.success("Add new Types successfully", {
                            position: "bottom-right",
                            duration: 2000
                        });
                    }, 1000);
                    this.$router.push({ name: "theloai" });
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
                        }, 1000);
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
