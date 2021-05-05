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
                    <li class="breadcrumb-item">Item</li>
                    <li class="breadcrumb-item">Create</li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-th-list"></i> Item list</h1>
            </div>
        </div>

        <form>
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
            <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
                <!-- <span v-if="errors.scan" class="label label-danger">
                    {{ errors.scan[0] }}
                </span>
                <span v-if="errors.tour360" class="label label-danger">
                    {{ errors.tour360[0] }}
                </span> -->
                <span v-if="errors.image" class="label label-danger">
                    {{ errors.image[0] }}
                </span>
                <!-- <span v-if="errors.detail" class="label label-danger">
                    {{ errors.detail[0] }}
                </span> -->
                <span v-if="errors.title" class="label label-danger">
                    {{ errors.sub_title[0] }}
                </span>
            </div>

            <div class="form-group">
                <input
                    type="title"
                    ref="title"
                    class="form-control"
                    id="title"
                    placeholder="Enter title English"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    type="title"
                    ref="title_vn"
                    class="form-control"
                    id="title_vn"
                    placeholder="Enter title Vienamese"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    type="title"
                    ref="tour360"
                    class="form-control"
                    id="tour360"
                    placeholder="Enter tour360"
                />
            </div>

            <div class="form-group">
                <input
                    class="form-control"
                    ref="scan"
                    id="short_content"
                    placeholder="Enter  link scan"
                    rows="8"
                />
            </div>

            <div class="form-group">
                <textarea
                    class="form-control"
                    ref="detail"
                    id="detail"
                    placeholder="Enter  detail English"
                    rows="8"
                ></textarea>
            </div>
            <div class="form-group">
                <textarea
                    class="form-control"
                    ref="detail_vn"
                    id="detail_vn"
                    placeholder="Enter  detail VietNamese"
                    rows="8"
                ></textarea>
            </div>

            <div class="form-group">
                <input
                    class="form-control"
                    ref="icon_class"
                    id="icon_class"
                    placeholder="Enter icon_class"
                    rows="8"
                >
            </div>
            <div class="form-group">
                <input
                    type="title"
                    ref="video"
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
                    required
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
                <label class="custom-file-label">Choose image file for Upload Video...</label>
            </div>
            <div class="modal-footer justify-content-center">
                <router-link
                    :to="{
                        name: 'content',
                        params: { sectionId: sectionId, postId: postId }
                    }"
                    class="btn btn-white block"
                >
                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    Back
                </router-link>
                <button
                    type="submit"
                    @click.prevent="create"
                    class="btn btn-primary block"
                >
                    Create
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { PAGE_RESET_STATE } from "../store/actions/page";
import { CREATE_ITEM } from "../store/actions/item";
import { mapGetters } from "vuex";
import store from "../store/store";
export default {
    props: {
        sectionId: {
            required: true
        },
        postId: {
            required: true
        }
    },
    data() {
        return {
            error: false,
            successful: false,
            errors: []
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
        create() {
            const formData = new FormData();
            formData.append("title", this.$refs.title.value);
            formData.append("title_vn", this.$refs.title_vn.value);
            formData.append("tour360", this.$refs.tour360.value);
            formData.append("scan", this.$refs.scan.value);
            formData.append("detail", this.$refs.detail.value);
            formData.append("detail_vn", this.$refs.detail_vn.value);
            formData.append("video", this.$refs.video.value);
            formData.append("image", this.$refs.image.files[0]);
            formData.append("icon_class", this.$refs.icon_class.value);
            formData.append("video_upload", this.$refs.video_upload.files[0]);

            this.$store
                .dispatch(CREATE_ITEM, {
                    slug: this.sectionId,
                    data: formData
                })
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                    this.$router.back();
                }).catch(error => {
                    console.log(error);
                    if (!_.isEmpty(error.response)) {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                            this.successful = false;
                            this.error = true;
                        }
                    }
                });

            //   this.$refs.name.value = "";
            //   this.$refs.description.value = "";
            //     this.$refs.name.value = "";
            //   this.$refs.description.value = "";
            // this.$refs.name.value = "";
            //   this.$refs.description.value = "";
        }
    }
};
</script>

<style></style>
