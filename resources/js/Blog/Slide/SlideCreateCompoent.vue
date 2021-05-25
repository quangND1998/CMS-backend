<template>
     <div id="posts">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <li class="breadcrumb-item">Slide</li>
                    <li class="breadcrumb-item">Create</li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-sliders"></i> Thêm  Slide</h1>
            </div>
        </div>

        <!-- {{page}}   -->
        <form @submit.prevent="create()">
     

            <div class="form-group">
                <input
                    type="text"
                    ref="slide_name"
                    class="form-control"
                    id="slide_name"
                    placeholder="Nhập vào tên slide_name"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    ref="slide_url"
                    class="form-control"
                    id="slide_url"
                    placeholder="Nhập vòa link Slide (nếu có)"
                />
            </div>

            <div class="form-group">
                <textarea
                    class="form-control"
                    ref="slide_content"
                    id="slide_content"
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
    SLIDE_PUBLISH,
    SLIDE_RESET_STATE,
} from '../../components/store/slideModule/action'
export default {
  props: {},
    data() {
        return {
            error: false,
            successful: false,
            errors: []
        };
    },
    computed: {
        ...mapGetters(["slide"])
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(SLIDE_RESET_STATE);
        next();
    },
    methods: {
        create() {
            const formData = new FormData();
            formData.append("slide_name", this.$refs.slide_name.value);
            formData.append("slide_content", this.$refs.slide_content.value);
            formData.append("slide_url", this.$refs.slide_url.value);
            formData.append("slide_img", this.$refs.slide_img.files[0]);

            // this.page.name = formData.get('name')
            // this.page.description = formData.get('description')
            // this.page.image = formData.get('image')

            this.$store
                .dispatch(SLIDE_PUBLISH, formData)
                .then(response => {
               
                    setTimeout(() => {
                        this.$toast.success("Add new Slide successfully", {
                            position: "bottom-right",
                            duration: 2000
                        });
                    }, 1000);
                    this.$router.push({ name: "slide" });
                })
                .catch(error => {

                   if (error.response.data.errors.slide_name) {
                        setTimeout(() => {
                            this.$toast.error(
                                error.response.data.errors.slide_name[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 1000);
                    }
                       if (error.response.data.errors.slide_content) {
                        setTimeout(() => {
                            this.$toast.error(
                                error.response.data.errors.slide_content[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 1000);
                    }
                       if (error.response.data.errors.slide_img) {
                        setTimeout(() => {
                            this.$toast.error(
                                error.response.data.errors.slide_img[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 1000);
                    }
                });


        }
    }
}
</script>

<style>

</style>
