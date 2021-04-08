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
                    <li class="breadcrumb-item text-danger">Section name</li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-th-list"></i> Item list</h1>
            </div>
            <router-link
                :to="{
                    name: 'content_create',
                    params: { sectionId: sectionId, postId: postId }
                }"
            >
                <button
                    type="button"
                    class="p-2 mx-3 float-left btn btn-success"
                >
                    NEW ITEM
                </button>
            </router-link>
        </div>
        <div>
            <!-- <router-link
                :to="{
                    name: 'content_create',
                    params: { sectionId: sectionId, postId: postId }
                }"
            >
                <button
                    type="button"
                    class="p-2 mx-3 float-left btn btn-success"
                >
                    NEW CONTENT
                </button>
            </router-link> -->
            <router-link :to="{ name: 'section', params: { postId: postId } }">
                <button
                    type="button"
                     class="p-1 mx-3  btn btn-success"
                >
                    BACK
                </button>
            </router-link>
        </div>
        <div class="col-md-12 px-0">
            <div class="">
                <div class="table-responsive">
                    <table id="user-table" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Sub-title</th>
                                <th>Short content</th>
                                <th>Video</th>
                                <th>Image</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(content, index) in contents"
                                :key="content.id"
                                data-entry-id=""
                                class="user_input"
                            >
                                <td class="align-middle">{{ index + 1 }}</td>
                                <td class="align-middle">{{ content.title }}</td>
                                <td :class="[content.subtitle ? '' : 'text-success', 'align-middle']">{{ content.subtitle ? content.subtitle : 'Updating...' }}</td>
                                <td :class="[content.short_content ? '' : 'text-success', 'align-middle']">{{ content.short_content ? content.short_content : 'Updating...' }}</td>
                                <td v-if="content.video">
                                    <iframe
                                        width="560"
                                        height="315"
                                        :src="content.video"
                                        title="description"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen
                                    ></iframe>
                                </td>
                                <td v-else class="text-success align-middle">Updating...</td>
                                <td>
                                    <img
                                        :src="content.image"
                                        style="width: 150px"
                                    />
                                </td>

                                <td class="align-middle">
                                    <router-link
                                        :to="{
                                            name: 'content.update',
                                            params: {
                                                contentId: content.id,
                                                sectionId: sectionId,
                                                postId: postId
                                            }
                                        }"
                                    >
                                        <button
                                            class="btn btn-xs btn-info deleteRecord"
                                            id="deleteRecord"
                                        >
                                            Update
                                        </button>
                                    </router-link>
                                    <button
                                        class="btn btn-xs btn-danger deleteRecord"
                                        id="deleteRecord"
                                        @click="deletePost(content.id)"
                                    >
                                        Delete
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
import { FETCH_ITEM, ITEM_DELETE, GET_ITEM_ID } from "../store/actions/item";
import { PAGE_RESET_STATE } from "../store/actions/page";
export default {
    name: "page-component",
    props: {
        sectionId: {
            required: true
        },
        postId: {
            required: true
        }
    },

    mounted() {
        this.getPosts();
    },
    computed: {
        ...mapGetters(["contents", "content"])
    },

    data() {
        return {};
    },
    async beforeRouteLeave(to, from, next) {
        await store.dispatch(PAGE_RESET_STATE);
        next();
    },

    methods: {
        getPosts() {
            this.$store.dispatch(FETCH_ITEM, this.sectionId);
        },
        deletePost(id) {
            this.$store.dispatch(ITEM_DELETE, id);
            this.getPosts();
        }
    }
};
</script>
