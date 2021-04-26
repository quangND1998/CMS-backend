<template>
    <div>
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

        <form>
            <div
                :class="[
                    'form-group m-1 p-3',
                    successful ? 'alert-success' : ''
                ]"
            >
                <span v-if="successful" class="label label-sucess"
                    >Published!</span
                >
            </div>
            <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
                <span v-if="errors.subtitle" class="label label-danger">
                    {{ errors.subtitle[0] }}
                </span>
                <span v-if="errors.short_content" class="label label-danger">
                    {{ errors.short_content[0] }}
                </span>
                <span v-if="errors.image" class="label label-danger">
                    {{ errors.image[0] }}
                </span>
                <span v-if="errors.detail" class="label label-danger">
                    {{ errors.detail[0] }}
                </span>
                <span v-if="errors.title" class="label label-danger">
                    {{ errors.sub_title[0] }}
                </span>
                <span v-if="errors.icon_image" class="label label-danger">
                    {{ errors.icon_image[0] }}
                </span>
                <span v-if="errors.icon_class" class="label label-danger">
                    {{ errors.icon_class[0] }}
                </span>
            </div>

            <div class="form-group">
                <input
                    type="title"
                    ref="title"
                    v-model="content.title"
                    class="form-control"
                    id="title"
                    placeholder="Enter title"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    type="title"
                    ref="title_vn"
                    v-model="content.title_vn"
                    class="form-control"
                    id="title_vn"
                    placeholder="Enter title"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    type="title"
                    ref="tour360"
                    v-model="content.tour360"
                    class="form-control"
                    id="tour360"
                    placeholder="Enter link tour360 "
                />
            </div>

            <div class="form-group">
                <input
                    class="form-control"
                    v-model="content.scan"
                    ref="scan"
                    id="short_content"
                    placeholder="Enter link scan"
                    rows="8"
                />
            </div>

            <div class="form-group">
                <textarea
                    class="form-control"
                    v-model="content.detail"
                    ref="detail"
                    id="detail"
                    placeholder="Enter detail"
                    rows="8"
                ></textarea>
            </div>
<<<<<<< HEAD
=======
            <div class="form-group">
                <textarea
                    class="form-control"
                    v-model="content.detail_vn"
                    ref="detail_vn"
                    id="detail_vn"
                    placeholder="Enter  detail VietNamese"
                    rows="8"
                ></textarea>
            </div>
<<<<<<< HEAD
>>>>>>> origin
            <!-- <div class="form-group">
=======
            <div class="form-group">
>>>>>>> origin/master
                <input
                    type="title"
                    ref="icon_class"
                    v-model="content.icon_class"
                    class="form-control"
                    id="icon_class"
                    placeholder="Enter class icon"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    type="title"
                    ref="video"
                    v-model="content.video"
                    class="form-control"
                    id="video"
                    placeholder="Enter video link"
                />
            </div>

            <div class="custom-file mb-3">
                <input
                    type="file"
                    ref="image"
                    name="image"
                    class="custom-file-input"
                    id="image"
                />
                <label class="custom-file-label">Choose image file...</label>
            </div>
            <div class="custom-file mb-3">
                <input
                    type="file"
                    ref="video_upload"
                    name="video_upload"
                    class="custom-file-input"
                    id="video_upload"
                    required
                />
                <label class="custom-file-label"
                    >Choose image file for Upload Video...</label
                >
            </div>

            <button
                type="submit"
                @click.prevent="update"
                class="btn btn-primary block"
            >
                Update
            </button>
        </form>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import { ITEM_EDIT, GET_ITEM_ID } from "../../store/actions/item";
import { PAGE_RESET_STATE } from "../../store/actions/page";
import store from "../../store/store";
export default {
    mounted() {
        this.getPost();
    },
    props: {
        contentId: {
            required: true
        },
        sectionId: {
            required: true
        },
        postId: {
            required: true
        }
    },
    computed: {
        ...mapGetters(["content"])
    },
    data() {
        return {
            error: false,
            successful: false,
            errors: []
        };
    },
    async beforeRouteLeave(to, from, next) {
        await store.dispatch(PAGE_RESET_STATE);
        next();
    },
    methods: {
        update() {
            const formData = new FormData();
            formData.append("title", this.$refs.title.value);
            formData.append("title_vn", this.$refs.title_vn.value);
            formData.append("tour360", this.$refs.tour360.value);
            formData.append("scan", this.$refs.scan.value);
            formData.append("detail", this.$refs.detail.value);
            formData.append("detail_vn", this.$refs.detail_vn.value);
            formData.append("video", this.$refs.video.value);
            formData.append("icon_class", this.$refs.icon_class.value);
            formData.append("image", this.$refs.image.files[0]);
            formData.append("video_upload", this.$refs.video_upload.files[0]);
            this.$store
                .dispatch(ITEM_EDIT, {
                    slug: this.content.id,
                    data: formData
                })
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                    this.$router.back();
                })
                .catch(error => {
                    if (!_.isEmpty(error.response)) {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                            this.successful = false;
                            this.error = true;
                        }
                    }
                });
<<<<<<< HEAD

=======
>>>>>>> origin/master
        },
        getPost() {
            this.$store.dispatch(GET_ITEM_ID, this.contentId);
        }
    }
};
</script>

<style></style>
