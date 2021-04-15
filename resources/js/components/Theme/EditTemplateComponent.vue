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
                    <li class="breadcrumb-item">Update</li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-th-list"></i> Page list</h1>
            </div>
            <!-- <router-link :to="{ name: 'create' }" class="btn btn-success">
                ADD NEW
            </router-link> -->
        </div>
        <!-- <router-link :to="{ name: 'page' }">
            <button type="button" class="p-1 mx-3 float-left btn btn-sucess">
                BACK
            </button>
        </router-link> -->

        <form @submit.prevent="update()">
            <div
                :class="[
                    'form-group m-1 p-3',
                    successful ? 'alert-success' : ''
                ]"
            >
                <span v-if="successful" class="label label-sucess"
                    >Updated!</span
                >
            </div>

            <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
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
            </div>

            <div class="form-group">
                <input
                    type="text"
                    ref="title"
                    v-model="theme.title"
                    class="form-control"
                    id="title"
                    placeholder="Enter title"
                />
            </div>
          

            <div class="form-group">
                <input
                    class="form-control"
                    ref="link_code"
                    v-model="theme.link_code"
                    id="link_code"
                    placeholder="Enter a link_code"
                    rows="8"
                    
                />
            </div>
            <div class="custom-file mb-3">
                <input
                    type="file"
                    ref="image_template"
                    name="image_template"
                    class="custom-file-input"
                    id="image_template"
                />
                <label class="custom-file-label">Choose file...</label>
            </div>
            <div class="modal-footer justify-content-center">
                <router-link :to="{ name: 'theme' }" class="btn btn-white block">
                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    Back
                </router-link>
                <button type="submit" class="btn btn-primary block">
                    Update
                </button>
            </div>
        </form>
        <div style="height: 700px;"></div>
        <h3 id="react">Learn React with Sky Albert</h3>
        <div style="height: 1700px;"></div>
    </div>
</template>

<script>
import {
    THEME_EDIT,
    GET_THEME_ID,
    theme_RESET_STATE
} from "../store/actions/theme";
import { mapGetters } from "vuex";
import store from "../store/store";
export default {
    mounted() {
        this.getPost();
    },

    props: {
        themeId: {
            required: true
        }
    },
    data() {
        return {
            error: false,
            successful: false,
            errors: [],
            hash: "#react"
        };
    },
    computed: {
        ...mapGetters(["theme"])
    },
    async beforeRouteLeave(to, from, next) {
        await store.dispatch(theme_RESET_STATE);
        next();
    },

    methods: {
        update() {
            const formData = new FormData();
            formData.append("title", this.$refs.title.value);

            formData.append("link_code", this.$refs.link_code.value);
            formData.append("image_template", this.$refs.image_template.files[0]);
            // this.page.name = formData.get("name");
            // this.page.description = formData.get("description");
            // this.page.image = formData.get("image");

            this.$store
                .dispatch(THEME_EDIT, { slug: this.themeId, formdata: formData })
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                    this.$router.push({ name: "theme" });
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
        },
        getPost() {
            this.$store.dispatch(GET_THEME_ID, this.themeId);
        }
    }
};
</script>

<style></style>
