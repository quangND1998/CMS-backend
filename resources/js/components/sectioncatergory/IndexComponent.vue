<template>
    <div id="posts">
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
                    <li class="breadcrumb-item text-danger">Page name</li>
                    <li class="breadcrumb-item">Section</li>
                </ul>
                <h1 class="mt-2">
                    <i class="fa fa-th-list"></i> Section Category list
                </h1>
            </div>
            <router-link
                :to="{
                    name: 'section_category_create',
                    params: { postId: postId, sectionId: sectionId }
                }"
            >
                <button type="button" class="btn btn-success">
                    NEW SECTION
                </button>
            </router-link>
        </div>
        <!-- <div>
            <router-link
                :to="{
                    name: 'content',
                    params: { postId: postId, sectionId: sectionId }
                }"
                class="p-1 mx-3 btn btn-white block"
            >
                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                Back
            </router-link>
        </div> -->

        <div class="col-md-12">
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(category, index) in section_categorys"
                                :key="category.id"
                                data-entry-id=""
                                class="user_input"
                            >
                                <td class="align-middle">{{ index + 1 }}</td>

                                <td
                                    class="align-middle text-uppercase font-weight-bold"
                                >
                                    <router-link
                                        :to="{
                                            name: 'section_category_content',
                                            params: {
                                                categoryId: category.id,
                                                postId: postId,
                                                sectionId: sectionId
                                            }
                                        }"
                                    >
                                        {{ category.title }}
                                    </router-link>
                                </td>

                                <!-- <td class="align-middle">{{ section.sub_title }}</td> -->

                                <td class="align-middle">
                                    <router-link
                                        :to="{
                                            name: 'section_category_update',
                                            params: {
                                                categoryId: category.id,
                                                id: postId,
                                                sectionId: sectionId
                                            }
                                        }"
                                        class="btn btn-xs btn-info deleteRecord"
                                    >
                                        <i
                                            class="fa fa-pencil mr-0"
                                            aria-hidden="true"
                                        ></i>
                                    </router-link>
                                    <button
                                        class="btn btn-xs btn-danger deleteRecord"
                                        id="deleteRecord"
                                        @click="deletePost(category.id)"
                                    >
                                        <i
                                            class="fa fa-trash mr-0"
                                            aria-hidden="true"
                                        ></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <router-link
                :to="{
                    name: 'content',
                    params: { postId: postId, sectionId: sectionId }
                }"
                class="p-1 mx-3 btn btn-white block"
            >
                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                Back
            </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import store from "../store/store";
import {
    FETCH_SECTION_CATEGORY,
    SECTION_CATEGORY_DELETE
} from "../store/actions/sectioncategory";
import { PAGE_RESET_STATE } from "../store/actions/page";
export default {
    props: {
        postId: {
            required: true
        },
        sectionId: {
            required: true
        }
    },

    created() {
        this.getPosts();
    },
    computed: {
        ...mapGetters(["section_categorys", "category"])
    },
    async beforeRouteLeave(to, from, next) {
        await store.dispatch(PAGE_RESET_STATE);
        next();
    },

    data() {
        return {};
    },

    methods: {
        getPosts() {
            this.$store.dispatch(FETCH_SECTION_CATEGORY, this.sectionId);
        },
        deletePost(id) {
            this.$store.dispatch(SECTION_CATEGORY_DELETE, id);
            this.getPosts();
        }
    }
};
</script>

<style></style>
