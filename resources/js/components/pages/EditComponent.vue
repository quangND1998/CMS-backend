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
            <!-- <div
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
                <span v-if="errors.description" class="label label-danger">
                    {{ errors.description[0] }}
                </span>
                <span v-if="errors.image" class="label label-danger">
                    {{ errors.image[0] }}
                </span>
            </div> -->

            <div class="form-group">
                <input
                    type="title"
                    ref="name"
                    v-model="page.name"
                    class="form-control"
                    id="name"
                    placeholder="Enter title"
                    required
                />
            </div>

            <div class="form-group">
                <textarea
                    class="form-control"
                    ref="description"
                    v-model="page.description"
                    id="description"
                    placeholder="Enter a body"
                    rows="8"
                    required
                ></textarea>
            </div>
            <div class="custom-file mb-3">
                <input
                    type="file"
                    ref="image"
                    name="image"
                    class="custom-file-input"
                    id="image"
                />
                <label class="custom-file-label">Choose file...</label>
            </div>
            <div class="modal-footer justify-content-center">
                <router-link :to="{ name: 'page' }" class="btn btn-white block">
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
    PAGE_EDIT,
    GET_PAGE_ID,
    PAGE_RESET_STATE
} from "../store/actions/page";
import { mapGetters } from "vuex";
import store from "../store/store";
export default {
    mounted() {
        this.getPost();
    },

    props: {
        postId: {
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
        ...mapGetters(["page"])
    },
    async beforeRouteLeave(to, from, next) {
        await store.dispatch(PAGE_RESET_STATE);
        next();
    },

    methods: {
        update() {
            const formData = new FormData();
            formData.append("name", this.$refs.name.value);
            formData.append("description", this.$refs.description.value);
            formData.append("image", this.$refs.image.files[0]);
            this.page.name = formData.get("name");
            this.page.description = formData.get("description");
            this.page.image = formData.get("image");

            this.$store
                .dispatch(PAGE_EDIT, { slug: this.postId, formdata: formData })
                .then(({ data }) => {
                    this.$router.push({ name: "page" });
                })
                .catch(({ response }) => {
                    console.log(response);
                    this.errors = response.data.errors;
                });
        },
        getPost() {
            this.$store.dispatch(GET_PAGE_ID, this.postId);
        }
    }
};
</script>

<style></style>
