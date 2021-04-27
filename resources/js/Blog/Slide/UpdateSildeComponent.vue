<template>
    <div id="posts">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <li class="breadcrumb-item">Slide</li>
                    <li class="breadcrumb-item">Update</li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-th-list"></i> Update slide</h1>
            </div>
        </div>

        <!-- {{page}}   -->
        <form @submit.prevent="update()">
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
                <span v-if="errors.slide_name" class="label label-danger">
                    {{ errors.slide_name[0] }}
                </span>
                <span v-if="errors.slide_content" class="label label-danger">
                    {{ errors.slide_content[0] }}
                </span>
                <span v-if="errors.slide_url" class="label label-danger">
                    {{ errors.slide_url[0] }}
                </span>
                <span v-if="errors.slide_img" class="label label-danger">
                    {{ errors.slide_img[0] }}
                </span>
            </div>

            <div class="form-group">
                <input
                    type="text"
                    ref="slide_name"
                    class="form-control"
                    v-model="slide.slide_name"
                    id="slide_name"
                    placeholder="Nhập vào tên slide_name"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    ref="slide_url"
                    class="form-control"
                       v-model="slide.slide_url"
                    id="slide_url"
                    placeholder="Nhập vòa link Slide (nếu có)"
                />
            </div>

            <div class="form-group">
                <textarea
                    class="form-control"
                    ref="slide_content"
                    id="slide_content"
                           v-model="slide.slide_content"
                    placeholder="Nhập vào nội dung slide"
                    rows="8"
                ></textarea>
            </div>

            <div class="custom-file mb-3">
                <input
                    type="file"
                    ref="slide_img"
                    name="slide_img"
                    class="custom-file-input"
                    id="slide_img"
                />
                <label class="custom-file-label">Choose file...</label>
            </div>

            <div class="modal-footer justify-content-center">
                <router-link
                    :to="{ name: 'slide' }"
                    type="button"
                    class="mr-1 btn btn-sucess block"
                >
                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    Back
                </router-link>
                <button type="submit" class="btn btn-primary block">
                    Create
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import store from "../../components/store/store";
import {
    SLIDE_EDIT,
    GET_SLIDE_ID,
    SLIDE_RESET_STATE,
} from '../../components/store/slideModule/action'
export default {
  mounted() {
        this.getSlide();
    },

    props: {
        slideId: {
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
        ...mapGetters(["slide"])
    },
    async beforeRouteLeave(to, from, next) {
        await store.dispatch(SLIDE_RESET_STATE);
        next();
    },

    methods: {
        update() {
          const formData = new FormData();
            formData.append("slide_name", this.$refs.slide_name.value);
            formData.append("slide_content", this.$refs.slide_content.value);
            formData.append("slide_url", this.$refs.slide_url.value);
            formData.append("slide_img", this.$refs.slide_img.files[0]);

            this.$store
                .dispatch(SLIDE_EDIT, { slug: this.slideId, formdata: formData })
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                    this.$router.push({ name: "slide" });
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
        },
        getSlide() {
            this.$store.dispatch(GET_SLIDE_ID, this.slideId);
        }
    }
}
</script>

<style>

</style>
