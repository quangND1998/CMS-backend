<template>
    <div class="">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>

                    <li class="breadcrumb-item active">
                        <router-link :to="{ name: 'page' }">
                            Page list
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
            <!-- <div
                :class="[
                    'form-group m-1 p-3',
                    successful ? 'alert-success' : ''
                ]"
            >
                <span v-if="successful" class="label label-sucess"
                    >Published!</span
                >
            </div> -->

            <!-- <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
                <span v-if="errors.name" class="label label-danger">
                    {{ errors.name[0] }}
                </span>
                <span v-if="errors.name_vn" class="label label-danger">
                    {{ errors.name_vn[0] }}
                </span>
                <span v-if="errors.description" class="label label-danger">
                    {{ errors.description[0] }}
                </span>
                <span v-if="errors.image" class="label label-danger">
                    {{ errors.image[0] }}
                </span>
            </div> -->
            <vue-loading
                v-if="isLoading"
                type="spiningDubbles"
                color="#d9544e"
                :size="{ width: '64px', height: '64px' }"
                :style="[isLoading ? { zIndex: -1, opacity: 1 } : '']"
            ></vue-loading>
            <div class="form-group">
                <input
                    type="text"
                    ref="name"
                    class="form-control"
                    id="name"
                    placeholder="Enter the page name"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    ref="name_vn"
                    class="form-control"
                    id="name_vn"
                    placeholder="Enter the Vietnamese page name"
                />
            </div>

            <div class="form-group">
                <textarea
                    class="form-control"
                    ref="description"
                    id="description"
                    placeholder="Enter a description for the page"
                    rows="8"
                ></textarea>
            </div>

            <!-- <div class="custom-file mb-3">
                <input
                    type="file"
                    ref="image"
                    name="image"
                    class="custom-file-input"
                    id="image"
                />
                <label class="custom-file-label">Choose file...</label>
            </div> -->
  

            <UploadImages :max="1" ref="image" />
            <div class="modal-footer justify-content-center">
                <router-link
                    :to="{ name: 'page' }"
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
import { PAGE_PUBLISH, PAGE_RESET_STATE } from "../store/actions/page";
import { mapGetters } from "vuex";
import store from "../store/store";
export default {
    props: {},
    components: {
        UploadImages,

    },
    data() {
        return {
            error: false,
            successful: false,
            errors: [],
            isLoading: false
        };
    },
    computed: {
        ...mapGetters(["page"])
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(PAGE_RESET_STATE);
        next();
    },
    methods: {
        create() {
            const formData = new FormData();
            formData.append("name", this.$refs.name.value);
            formData.append("name_vn", this.$refs.name_vn.value);
            formData.append("description", this.$refs.description.value);
            formData.append("image", this.$refs.image.files[0]);
            this.$store
                .dispatch(PAGE_PUBLISH, formData)
                .then(response => {
                    this.isLoading = true;

                    setTimeout(() => {
                        this.isLoading = false;
                        this.$toast.success("Add new page successfully", {
                            position: "bottom-right",
                            duration: 2000
                        });
                        this.$router.push({ name: "page" });
                    }, 1000);
                })
                .catch(error => {
                    this.isLoading = true;
                    if (error.response.data.errors.name) {
                        setTimeout(() => {
                            this.isLoading = false;
                            this.$toast.error(
                                error.response.data.errors.name[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 1000);
                    }
                    if (error.response.data.errors.name_vn) {
                        setTimeout(() => {
                            this.isLoading = false;
                            this.$toast.error(
                                error.response.data.errors.name_vn[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 2000);
                    }
                });
        }
    }
};
</script>
