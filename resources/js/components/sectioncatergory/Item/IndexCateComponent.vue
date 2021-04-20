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
                    name: 'section_category_content.create',
                    params: {
                        sectionId: sectionId,
                        postId: postId,
                        categoryId: categoryId
                    }
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
            <router-link :to="{ name: 'section_category', params: { postId: postId ,sectionId:sectionId} }">
                <button type="button" class="p-1 mx-3  btn btn-success">
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
                                <th>Title English</th>
                                <th>Title Vienamese</th>
                                <th>Detail English</th>
                                <th>Detail Vienamese</th>
                                <th>Scan Link</th>
                                <th>Tour360</th>
                                <th>Video</th>
                                <th>Image</th>
                                <th>ICon class</th>
                                <th>Video Upload</th>
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
                                <td class="align-middle">
                                    {{ content.title }}
                                </td>
                                  <td class="align-middle">
                                    {{ content.title_vn }}
                                </td>
                                <td
                                    :class="[
                                        content.detail ? '' : 'text-success',
                                        'align-middle'
                                    ]"
                                >
                                    {{
                                        content.detail
                                            ? content.detail
                                            : "Updating..."
                                    }}
                                </td>
                                   <td
                                    :class="[
                                        content.detail_vn ? '' : 'text-success',
                                        'align-middle'
                                    ]"
                                >
                                    {{
                                        content.detail_vn
                                            ? content.detail_vn
                                            : "Updating..."
                                    }}
                                </td>
                                   <td
                                    :class="[
                                        content.scan ? '' : 'text-success',
                                        'align-middle'
                                    ]"
                                >
                                    {{
                                        content.scan
                                            ? content.scan
                                            : "Updating..."
                                    }}
                                </td>
                                <td
                                    :class="[
                                        content.tour360
                                            ? ''
                                            : 'text-success',
                                        'align-middle'
                                    ]"
                                >
                                    {{
                                        content.tour360
                                            ? content.tour360
                                            : "Updating..."
                                    }}
                                </td>
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
                                <td v-else class="text-success align-middle">
                                    Updating...
                                </td>
                                <td>
                                    <img
                                        :src="content.image"
                                        style="width: 150px"
                                    />
                                </td>
                                     <td
                                    :class="[
                                        content.icon_class ? '' : 'text-success',
                                        'align-middle'
                                    ]"
                                >
                                    {{
                                        content.icon_class
                                            ? content.icon_class
                                            : "Updating..."
                                    }}
                                </td>
                                        <td
                                    :class="[
                                        content.video_upload ? '' : 'text-success',
                                        'align-middle'
                                    ]"
                                >
                                    {{
                                        content.video_upload
                                            ? content.video_upload
                                            : "Updating..."
                                    }}
                                </td>

                                <td class="align-middle">
                                    <router-link
                                        :to="{
                                            name:
                                                'section_category_content.update',
                                            params: {
                                                contentId: content.id,
                                                sectionId: sectionId,
                                                postId: postId,
                                                categoryId: categoryId
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
import store from "../../store/store";
// import store from "../store/store";
import {
    FETCH_ITEM,
    ITEM_DELETE,
    FETCH_ITEM_BY_CATEGORY
} from "../../store/actions/item";
import { PAGE_RESET_STATE } from "../../store/actions/page";
export default {
    name: "page-component",
    props: {
        sectionId: {
            required: true
        },
        postId: {
            required: true
        },
        categoryId: {
            required: true
        }
    },

    mounted() {
        this.getPosts();
    },
    computed: {
        ...mapGetters(["contents", "content", "time"])
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
            this.$store.dispatch(FETCH_ITEM_BY_CATEGORY, this.categoryId);
        },
        deletePost(id) {
            this.$store.dispatch(ITEM_DELETE, id);
            this.getPosts();
        }
    }
};
</script>
