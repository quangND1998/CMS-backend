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
                    <li class="breadcrumb-item">{{posts.name}}</li>
                    <!-- <li class="breadcrumb-item">Section</li> -->
                </ul>
                <h1 class="mt-2"><i class="fa fa-th-list"></i> Section list</h1>
            </div>
            <router-link
                :to="{ name: 'section_create', params: { postId: postId } }"
            >
                <button type="button" class="btn btn-success">
                    NEW SECTION
                </button>
            </router-link>
        </div>
        <!-- <div class="table-responsive">
            <table
                id="user-table"
                class="table table-striped table-bordered responsive"
                style="width:100%"
            >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>Text</th>
                        <th>subtitle</th>
                        <th style="width: 15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="section in sections"
                        :key="section.id"
                        data-entry-id=""
                        class="user_input"
                    >
                        <td></td>

                        <td>
                            <router-link
                                :to="{
                                    name: 'content',
                                    params: {
                                        sectionId: section.id,
                                        postId: postId
                                    }
                                }"
                            >
                                {{ section.title }}
                            </router-link>
                        </td>

                        <td>{{ section.text }}</td>

                        <td>{{ section.sub_title }}</td>

                        <td>
                            <button
                                class="btn btn-xs btn-danger deleteRecord"
                                id="deleteRecord"
                                @click="deletePost(section.id)"
                            >
                                Delete
                            </button>
                            <router-link
                                :to="{
                                    name: 'section.update',
                                    params: {
                                        sectionId: section.id,
                                        id: postId
                                    }
                                }"
                            >
                                <button
                                    class="btn btn-xs btn-success deleteRecord"
                                    id="deleteRecord"
                                >
                                    Update
                                </button>
                            </router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> -->
        <div class="col-md-12">
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Sub-title</th>
                                <th>Description</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(section, index) in sections"
                                :key="section.id"
                                data-entry-id=""
                                class="user_input"
                            >
                                <td class="align-middle">{{ index + 1 }}</td>

                                <td
                                    class="align-middle text-uppercase font-weight-bold"
                                >
                                    <router-link
                                        :to="{
                                            name: 'content',
                                            params: {
                                                sectionId: section.id,
                                                postId: postId
                                            }
                                        }"
                                    >
                                        {{ section.title }}
                                    </router-link>
                                </td>

                                <!-- <td class="align-middle">{{ section.sub_title }}</td> -->
                                <td
                                    :class="[
                                        section.sub_title ? '' : 'text-success',
                                        'align-middle'
                                    ]"
                                >
                                    {{
                                        section.sub_title
                                            ? section.sub_title
                                            : "Updating..."
                                    }}
                                </td>
                                <td
                                    :class="[
                                        section.text ? '' : 'text-success',
                                        'align-middle'
                                    ]"
                                >
                                    {{
                                        section.text
                                            ? section.text
                                            : "Updating..."
                                    }}
                                </td>

                                <td class="align-middle">
                                    <router-link
                                        :to="{
                                            name: 'section.update',
                                            params: {
                                                sectionId: section.id,
                                                id: postId
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
                                        @click="deletePost(section.id)"
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
                    <div class="modal-footer justify-content-center">
                        <router-link
                            :to="{ name: 'page' }"
                            class="btn btn-white block"
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
import { FETCH_SECTION, SECTION_DELETE } from "../store/actions/section";
import { PAGE_RESET_STATE } from "../store/actions/page";
export default {
    props: {
        postId: {
            required: true
        }
    },

    created() {
        this.getPosts();

    },
    computed: {
        ...mapGetters(["posts" ,"sections", "section"])
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
            this.$store.dispatch(FETCH_SECTION, this.postId);
        },
        deletePost(id) {
            this.$store.dispatch(SECTION_DELETE, id);
            this.getPosts();
        }
    }
};
</script>
