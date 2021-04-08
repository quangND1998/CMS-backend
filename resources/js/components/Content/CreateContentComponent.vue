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
            </div> -->

            <div class="form-group">
                <input
                    type="title"
                    ref="title"
                    class="form-control"
                    id="title"
                    placeholder="Enter title"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    type="title"
                    ref="subtitle"
                    class="form-control"
                    id="subtitle"
                    placeholder="Enter subtitle"
                />
            </div>

            <div class="form-group">
                <textarea
                    class="form-control"
                    ref="short_content"
                    id="short_content"
                    placeholder="Enter  short_content"
                    rows="8"
                ></textarea>
            </div>

            <div class="form-group">
                <textarea
                    class="form-control"
                    ref="detail"
                    id="detail"
                    placeholder="Enter  detail"
                    rows="8"
                ></textarea>
            </div>
            <!-- <div class="form-group">
                <input
                    type="title"
                    ref="icon_class"
                    class="form-control"
                    id="icon_class"
                    placeholder="Enter class icon"
                />
            </div> -->
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
            <!-- <div class="custom-file mb-3">
                <input
                    type="file"
                    ref="icon_image"
                    name="icon_image"
                    class="custom-file-input"
                    id="icon_image"
                    required
                />
                <label class="custom-file-label">Choose file...</label>
            </div> -->

            <div class="modal-footer justify-content-center">
                <router-link
                    :to="{
                        name: 'content',
                        params: { sectionId: sectionId, postId: postId }
                    }"
                    class="btn btn-white block"
                >
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
            formData.append("subtitle", this.$refs.subtitle.value);
            formData.append("short_content", this.$refs.short_content.value);
            formData.append("detail", this.$refs.detail.value);
            // formData.append("icon_class", this.$refs.icon_class.value);
            formData.append("video", this.$refs.video.value);

            formData.append("image", this.$refs.image.files[0]);
            // formData.append("icon_image", this.$refs.icon_image.files[0]);

            this.$store.dispatch(CREATE_ITEM, {
                slug: this.sectionId,
                data: formData
            });

            this.$router.back();

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
