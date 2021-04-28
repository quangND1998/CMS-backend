<template>
    <div id="posts">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <li class="breadcrumb-item active">
                        <router-link :to="{ name: 'thumbnail' }">
                            Thumbnail
                        </router-link>
                    </li>
                    <li class="breadcrumb-item">{{ thumb.name }}</li>
                    <li class="breadcrumb-item">Update</li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-picture-o"></i> Thumbnail</h1>
            </div>
        </div>
        <div class="col-md-12 px-0">
            <div class="">
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            ref="name"
                            class="form-control"
                            id="name"
                            placeholder="Enter the thumbnail name"
                            :value="thumb.name"
                        />
                    </div>
                    <div class="form-group">
                        <label for="name">Thumbnail</label>
                        <input
                            type="file"
                            ref="thumbnail"
                            name="thumbnail"
                            class="form-control"
                            id="thumbnail"
                            @change="onFileSelected"
                        />
                    </div>
                    <div class="form-group">
                        <label for="priority">State</label>
                        <select id="priority" class="form-control">
                            <option :selected="thumb.isPriority === 1">Public</option>
                            <option :selected="thumb.isPriority === 0">Private</option>
                        </select>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <router-link
                            :to="{ name: 'thumbnail' }"
                            type="button"
                            class="mr-1 btn btn-white block"
                        >
                            <i
                                class="fa fa-long-arrow-left"
                                aria-hidden="true"
                            ></i>
                            Back
                        </router-link>
                        <button class="btn btn-info block">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { AXIOS } from "../../common/http-common";

export default {
    props: ["id"],
    data() {
        return {
            thumb: null
        };
    },
    created() {
        AXIOS.get(`thumbnail/${this.id}`).then(res => {
            this.thumb = res.data;
        });
    },
    methods: {
        onFileSelected(e) {
            this.selectedFile = e.target.files[0];
        }
    }
};
</script>
