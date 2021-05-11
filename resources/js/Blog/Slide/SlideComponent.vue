<template>
    <div id="posts">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <li class="breadcrumb-item active">
                        Slider list
                    </li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-sliders" aria-hidden="true"></i> Slide list</h1>
            </div>
            <router-link :to="{ name: 'slide.create' }" class="btn btn-success">
                ADD NEW
            </router-link>
        </div>

        <div></div>

        <div class="col-md-12 px-0">
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên Slide</th>
                                <th>Nội dung Slide</th>
                                <th>Link</th>
                                <th>Hình ảnh Slide</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(slide, index) in slides" :key="slide.id">
                                <td class="align-middle">{{ index + 1 }}</td>
                                <td class="align-middle">

                                        {{ slide.slide_name }}

                                </td>
                                <td class="align-middle">

                                        {{ slide.slide_content }}

                                </td>
                                <td class="align-middle">
                                    {{ slide.slide_url }}
                                </td>
                                <td v-if="slide.slide_img" class="align-middle">
                                    <img
                                        :src="slide.slide_img"
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
                                            name: 'slide.update',
                                            params: { slideId: slide.id }
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
                                        @click="deletSlide(slide.id)"
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
import store from "../../components/store/store";
import {
    FETCH_SLIDE,
    SLIDE_RESET_STATE,
    SLIDE_DELETE
} from '../../components/store/slideModule/action'
export default {
   created() {
        this.fetchSlide();
    },
    props: {
        msg: {}
    },
    computed: {
        ...mapGetters(["slides"])
    },
    data() {
        return {};
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(SLIDE_RESET_STATE);
        next();
    },

    methods: {
        fetchSlide() {
            this.$store.dispatch(FETCH_SLIDE);
        },
        deletSlide(id) {
            this.$store.dispatch(SLIDE_DELETE, id);
            this.fetchSlide();
        }
    }
};
</script>
