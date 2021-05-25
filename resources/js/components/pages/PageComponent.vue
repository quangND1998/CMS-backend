<template>
    <div id="posts">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <!-- <li class="breadcrumb-item">Tables</li> -->
                    <li class="breadcrumb-item active">
                        <router-link :to="{ name: 'page' }">
                            Page list
                        </router-link>
                    </li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-th-list"></i> Page list</h1>
            </div>
            <router-link :to="{ name: 'create' }" class="btn btn-success">
                ADD NEW
            </router-link>
        </div>
        <!-- <div
            v-if="msg"
            :class="[
                'form-group m-1 p-3',
                msg ? 'alert alert-success alert-dismissible fade show' : ''
            ]"
            role="alert"
        >
            <strong>Congratulations !!!</strong> {{ msg }}.
            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close"
            >
                <span aria-hidden="true">&times;</span>
            </button>
        </div> -->
        <div>
            <!-- <router-link :to="{ name: 'create' }" class="btn btn-success">
                ADD NEW
            </router-link> -->
        </div>
        <!-- <div class="border p-3" v-for="post in posts" :key="post.id">
            <router-link :to="{ name: 'section', params: { postId: post.id } }">
                {{ post.name }}
            </router-link>
            {{ post.description }}
            <img v-bind:src="post.image" />
            <router-link :to="{ name: 'update', params: { postId: post.id } }">
                <button
                    type="button"
                    class="p-1 mx-3 float-right btn btn-light"
                >
                    Update
                </button>
            </router-link>
            <ul></ul>
            <button
                type="button"
                @click="deletePost(post.id)"
                class="p-1 mx-3 float-right btn btn-danger"
            >
                Delete
            </button>
        </div> -->
    
        <div class="col-md-12 px-0">
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name (EN)</th>
                                <th>Name (VN)</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(post, index) in posts" :key="post.id">
                                <td class="align-middle">{{ index + 1 }}</td>
                                <td class="align-middle">
                                    <router-link
                                        :to="{
                                            name: 'section',
                                            params: { postId: post.id }
                                        }"
                                        class="text-uppercase font-weight-bold"
                                    >
                                        {{ post.name }}
                                    </router-link>
                                </td>
                                     <td class="align-middle">
                                    <router-link
                                        :to="{
                                            name: 'section',
                                            params: { postId: post.id }
                                        }"
                                        class="text-uppercase font-weight-bold"
                                    >
                                        {{ post.name_vn }}
                                    </router-link>
                                </td>
                                <td class="align-middle">
                                    {{ post.description }}
                                </td>
                                <td v-if="post.image" class="align-middle">
                                    <img
                                        :src="post.image"
                                        style="width: 100px"
                                    />
                                </td>
                                <td v-else>
                                    <span class="text-success"
                                        >Updating...</span
                                    >
                                </td>
                                <td class="align-middle">
                                    <router-link
                                        :to="{
                                            name: 'update',
                                            params: { postId: post.id }
                                        }"
                                        class="btn btn-xs btn-info"
                                    >
                                        <i
                                            class="fa fa-pencil mr-0"
                                            aria-hidden="true"
                                        ></i>
                                    </router-link>
                                    <button
                                        type="button"
                                        @click="deletePost(post.id)"
                                        class="btn btn-xs btn-danger"
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import store from "../store/store";
import {
    FETCH_PAGES,
    PAGE_DELETE,
    PAGE_RESET_STATE
} from "../store/actions/page";

export default {
    name: "page-component",
    components: {},
    created() {
        this.fetchPages();
    },
    props: {
        msg: {}
    },
    computed: {
        ...mapGetters(["posts", "page", "isAuthenticated", "time"])
    },
    data() {
        return {};
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(PAGE_RESET_STATE);
        next();
    },

    methods: {
        fetchPages() {
           
            this.$store.dispatch(FETCH_PAGES);
        },
        deletePost(id) {
            this.$store.dispatch(PAGE_DELETE, id);
            this.fetchPages();
        }
    }
};
</script>
