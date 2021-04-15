<template>
      <div id="page-wrapper">
       
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Tin Tức
                        <small>> Update</small>
                    </h1>
                </div>

                <div
                    :class="['form-group m-1 p-3', error ? 'alert-danger' : '']"
                >
                    <span v-if="errors.idTheLoai" class="label label-danger">
                        {{ errors.idTheLoai[0] }}
                    </span>
                    <span v-if="errors.TieuDe" class="label label-danger">
                        {{ errors.TieuDe[0] }}
                    </span>
                    <span v-if="errors.TomTat" class="label label-danger">
                        {{ errors.TomTat[0] }}
                    </span>
                    <span v-if="errors.NoiDung" class="label label-danger">
                        {{ errors.NoiDung[0] }}
                    </span>
                    <span v-if="errors.TieuDe_en" class="label label-danger">
                        {{ errors.TieuDe_en[0] }}
                    </span>
                    <span v-if="errors.TomTat_en" class="label label-danger">
                        {{ errors.TomTat_en[0] }}
                    </span>
                    <span v-if="errors.NoiDung_en" class="label label-danger">
                        {{ errors.NoiDung_en[0] }}
                    </span>
                    <span v-if="errors.Hinh" class="label label-danger">
                        {{ errors.Hinh[0] }}
                    </span>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form @submit.prevent="create()">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1"
                                >Chọn Thể Loại</label
                            >
                            <select
                                class="form-control"
                                id="exampleFormControlSelect1"
                                v-model="item.idLoaiTin"
                            >
                                <option
                                    v-for="loaitin in loaitins"
                                    :key="loaitin.index"
                                    v-bind:value="loaitin.id"
                                    >{{ loaitin.Ten }}</option
                                >
                            </select>
                        </div>

                        <div class="content_vn">
                            <h3>Tin tức Tiếng Việt</h3>

                            <div class="form-group">
                                <p><label>Tiêu Đề</label></p>
                                <input
                                    type="text"
                                    class="form-control input-width"
                                    ref="TieuDe"
                                     v-model="item.TieuDe"
                                    placeholder="Nhập Tiêu Đề Tin Tức"
                                />
                            </div>

                            <div class="form-group">
                                <p><label>Tóm Tắt Nội Dung</label></p>

                                <textarea
                                    ref="TomTat"
                                    id="TomTat"
                                    class="form-control "
                                    rows="8"
                                      v-model="item.TomTat"
                                >
                                </textarea>
                            </div>

                            <div class="form-group">
                                <p><label>Nội Dung Bài Viết</label></p>
                                <textarea
                                    ref="NoiDung"
                                    id="NoiDung"
                                    class="form-control "
                                    rows="8"
                                      v-model="item.NoiDung"
                                >
                                </textarea>
                            </div>
                        </div>
                        <div class="content_en">
                            <h3>Tin tức tiếng Anh</h3>
                            <!-- language : nhập tên tiếng anh  -->
                            <div class="form-group">
                                <p><label>Tiêu Đề bản tiếng anh</label></p>
                                <input
                                    type="text"
                                    class="form-control input-width"
                                    placeholder="Nhập Tiêu Đề Tin Tức"
                                    ref="TieuDe_en"
                                          v-model="item.TieuDe_en"
                                />
                            </div>

                            <div class="form-group">
                                <p>
                                    <label
                                        >Tóm Tắt Nội Dung bản tiếng anh</label
                                    >
                                </p>

                                <textarea
                                    ref="TomTat_en"
                                    id="TomTat_en"
                                    class="form-control "
                                    rows="8"
                                       v-model="item.TomTat_en"
                                >
                                </textarea>
                            </div>

                            <div class="form-group">
                                <p>
                                    <label
                                        >Nội Dung Bài Viết bản tiếng anh</label
                                    >
                                </p>
                                <textarea
                                    ref="NoiDung_en"
                                    id="NoiDung_en"
                                    class="form-control "
                                    rows="8"
                                     v-model="item.NoiDung_en"
                                >
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <p><label>Thêm Hình Ảnh</label></p>
                            <input
                                type="file"
                                class="form-control"
                                name="article_img"
                                ref="Hinh"

                            />
                        </div>

                        <div class="form-group">
                            <p><label>Tin Tức Nổi Bật?</label></p>
                            <label class="radio-inline">
                                <input
                                    name="article_rep"
                                    value="1"
                                    checked=""
                                    v-model="item.NoiBat"
                                    type="radio"
                                />Có
                            </label>
                            <label class="radio-inline">
                                <input
                                    name="article_rep"
                                    value="0"
                                    v-model="item.NoiBat"
                                    type="radio"
                                />Không
                            </label>
                        </div>

                        <button type="submit" class="btn btn-default">
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
    TIN_TUC_EDIT,
    GET_TIN_TUC_ID,
    TIN_TUC_RESET_STATE
} from "../../components/store/tintucModule/action";
import { FETCH_LOAI_TIN } from "../../components/store/loaitinmodule/action";
export default {
    mounted() {
        this.fetchLoaiTin();
        this.fetchTintuc()
    },
    props: {
        tintucId:{
            required:true
        }
    },
    data() {
        return {
            error: false,
            successful: false,
            errors: [],
          
        };
    },
    computed: {
        ...mapGetters(["item", "loaitins"])
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(TIN_TUC_RESET_STATE);
        next();
    },
    methods: {
        create() {
            const formData = new FormData();
            formData.append("TieuDe", this.$refs.TieuDe.value);
            formData.append("TomTat", this.$refs.TomTat.value);

            formData.append("NoiDung", this.$refs.NoiDung.value);
            formData.append("TieuDe_en", this.$refs.TieuDe_en.value);

            formData.append("TomTat_en", this.$refs.TomTat_en.value);
            formData.append("NoiDung_en", this.$refs.NoiDung_en.value);
            formData.append("idLoaiTin", this.item.idLoaiTin);
            formData.append("NoiBat", this.item.NoiBat);
            formData.append("Hinh", this.$refs.Hinh.files[0]);
            let tieude = this.$refs.Hinh.value;
            console.log(tieude);
            this.$store
                .dispatch(TIN_TUC_EDIT,{slug:this.tintucId,formdata:formData} )
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                    this.$router.push({ name: "tintuc" });
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
        },
        fetchLoaiTin() {
            this.$store.dispatch(FETCH_LOAI_TIN);
        },
        fetchTintuc() {
            this.$store.dispatch(GET_TIN_TUC_ID,this.tintucId);
        }
    }
};
</script>

<style>

</style>