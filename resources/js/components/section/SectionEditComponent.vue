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
                    <li class="breadcrumb-item text-danger">Page name</li>
                    <li class="breadcrumb-item">Section</li>
                    <li class="breadcrumb-item text-danger">Section name</li>
                    <li class="breadcrumb-item">Update</li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-th-list"></i> Section list</h1>
            </div>
        </div>
        <!-- <div>

        </div> -->
        <form>
          
            <div class="form-group">
                <input
                    v-model="section.title"
                    type="title"
                    ref="title"
                    class="form-control"
                    id="title"
                    placeholder="Enter name English"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    type="title"
                    v-model="section.title_vn"
                    ref="title_vn"
                    class="form-control"
                    id="title_vn"
                    placeholder="Enter name  Vietnamese"
                    required
                />
            </div>

            <div class="form-group">
                <input
                    type="title"
                    ref="sub_title"
                    v-model="section.sub_title"
                    class="form-control"
                    id="sub_title"
                    placeholder="Enter sub title English"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    type="title"
                    ref="sub_title_vn"
                    v-model="section.sub_title_vn"
                    class="form-control"
                    id="sub_title_vn"
                    placeholder="Enter sub title VietNamese"
                    required
                />
            </div>

            <div class="form-group">
                <textarea
                    class="form-control"
                    ref="text"
                    v-model="section.text"
                    id="text"
                    placeholder="Enter a body English"
                    rows="6"
                    required
                ></textarea>
            </div>
            <div class="form-group">
                <input
                    type="title"
                    ref="text_vn"
                    v-model="section.text_vn"
                    class="form-control"
                    id="text_vn"
                    placeholder="Enter body VietNamese"
                    required
                />
            </div>
            <div class="form-group">
                <input
                    type="number"
                    ref="number"
                    v-model="section.number"
                    class="form-control"
                    id="number"
                    placeholder="Nhập vào số thứ tự section"
                    required
                />
            </div>
            <div class="form-group">
                <div
                    v-for="theme in themes"
                    :key="theme.index"
                    class="form-check form-check-inline"
                >
                <label class="form-check-label" for="inlineRadio1">{{
                        theme.id
                    }}</label>
                    <input
                        class="form-check-input"
                        type="radio"
                        v-model="section.theme_id"
                        v-bind:value="theme.id"
                        checked
                    />

                    <img :src="theme.image_template" style="width: 200px" />
                    
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                <router-link
                    :to="{ name: 'section', params: { postId: postId } }"
                    class="btn btn-white block"
                >
                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    Back
                </router-link>
                <button
                    type="submit"
                    @click.prevent="update"
                    class="btn btn-primary block"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { GET_SECTION_ID, SECTION_EDIT } from "../store/actions/section";
import { PAGE_RESET_STATE } from "../store/actions/page";
import { FETCH_THEMES } from "../store/actions/theme";
import { mapGetters } from "vuex";
import store from "../store/store";
export default {
    mounted() {
        this.getPost();
    },
    created() {
        this.getTemplate();
    },
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
        ...mapGetters(["section", "themes"])
    },
    async beforeRouteLeave(to, from, next) {
        await store.dispatch(PAGE_RESET_STATE);
        next();
    },
    methods: {
        update() {
            this.section.title = this.$refs.title.value;
            this.section.text = this.$refs.text.value;
            this.section.sub_title = this.$refs.sub_title.value;
            this.section.title_vn = this.$refs.title_vn.value;
            this.section.text_vn = this.$refs.text_vn.value;
            this.section.sub_title_vn = this.$refs.sub_title_vn.value;
            this.section.number = this.$refs.number.value;

            this.$store
                .dispatch(SECTION_EDIT, this.section.id)
                .then(response => {
                    this.successful = true;
                    this.error = false;
                    this.errors = [];
                    this.$router.push({
                        name: "section",
                        params: { postId: this.postId }
                    });
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

            this.$refs.title.value = "";
            this.$refs.text.value = "";
            this.$refs.sub_title.value = "";
            this.$refs.title_vn.value = "";
            this.$refs.text_vn.value = "";
            this.$refs.sub_title_vn.value = "";
            this.$refs.number.value = "";
        },
        getPost() {
            this.$store.dispatch(GET_SECTION_ID, this.sectionId);
        },

        getTemplate() {
            this.$store.dispatch(FETCH_THEMES);
        }
    }
};
</script>

<style></style>
