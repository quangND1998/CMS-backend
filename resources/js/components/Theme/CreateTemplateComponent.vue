<template>
    <div class="">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>

                    <li class="breadcrumb-item active">
                        <router-link :to="{ name: 'theme' }">
                            Template List
                        </router-link>
                    </li>
                    <li class="breadcrumb-item">Create</li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-th-list"></i> Page list</h1>
            </div>
            <!-- <router-link :to="{ name: 'create' }" class="btn btn-success">
                ADD NEW
            </router-link> -->
        </div>

        <!-- {{page}}   -->
        <form @submit.prevent="create()">
            <div class="form-group">
                <input
                    type="text"
                    ref="title"
                    class="form-control"
                    id="title"
                    placeholder="Enter title theme"
                />
            </div>

            <div class="form-group">
                <input
                    class="form-control"
                    ref="link_code"
                    id="link_code"
                    placeholder="Enter link_code for theme"
                    rows="8"
                />
            </div>

            <!-- <div class="custom-file mb-3">
                <input
                    type="file"
                    ref="image_template"
                    name="image_template"
                    class="custom-file-input"
                    id="image_template"
                />
                <label class="custom-file-label">Choose file...</label>
            </div> -->
            <UploadImages :max="1" ref="image_template" />
            <div class="form-group">
                <p><label>Type Template</label></p>
                <label class="radio-inline">
                    <input
                        name="article_rep"
                        value="1"
                        checked=""
                        v-model="theme.type"
                        type="radio"
                    />Có Section Category
                </label>
                <label class="radio-inline">
                    <input
                        name="article_rep"
                        value="0"
                        v-model="theme.type"
                        type="radio"
                    />Không Section Category
                </label>
                <label class="radio-inline">
                    <input
                        name="article_rep"
                        value="3"
                        v-model="theme.type"
                        type="radio"
                    />Blog
                </label>
            </div>

            <div class="modal-footer justify-content-center">
                <router-link
                    :to="{ name: 'theme' }"
                    type="button"
                    class="mr-1 btn btn-sucess block"
                >
                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    Back
                </router-link>
                <button type="submit" class="btn btn-primary block">
                    Create
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import UploadImages from "vue-upload-drop-images";
import { THEME_PUBLISH, theme_RESET_STATE } from "../store/actions/theme";
import { mapGetters } from "vuex";
import store from "../store/store";

export default {
    props: {},
    components: {
        UploadImages
    },
    data() {
        return {
            error: false,
            successful: false,
            errors: []
        };
    },
    computed: {
        ...mapGetters(["theme"])
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(theme_RESET_STATE);
        next();
    },
    methods: {
        create() {
            const formData = new FormData();
            formData.append("title", this.$refs.title.value);
            formData.append("link_code", this.$refs.link_code.value);
            formData.append("image_template",this.$refs.image_template.files[0]);
            formData.append("type", this.theme.type);

            this.$store
                .dispatch(THEME_PUBLISH, formData)
                .then(response => {
                    setTimeout(() => {
                        this.$router.push({ name: "theme" });
                        this.$toast.success("Add new theme successfully", {
                            position: "bottom-right",
                            duration: 2000
                        });
                    }, 1000);
                })
                .catch(error => {
                    //  console.log(error);
                    if (error.response.data.errors.title) {
                        setTimeout(() => {
                            this.isLoading = false;
                            this.$toast.error(
                                error.response.data.errors.title[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 1000);
                    }
                    if (error.response.data.errors.link_code) {
                        setTimeout(() => {
                            this.isLoading = false;
                            this.$toast.error(
                                error.response.data.errors.link_code[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 2000);
                    }
                      if (error.response.data.errors.image_template) {
                        setTimeout(() => {
                            this.isLoading = false;
                            this.$toast.error(
                                error.response.data.errors.image_template[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 2000);
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
