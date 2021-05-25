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
                    <li class="breadcrumb-item">Create</li>
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
                        />
                    </div>
                    <div class="form-group">
                        <label for="name">Thumbnail</label>
                        <input
                            type="file"
                            ref="thumbnail"
                            class="form-control"
                            id="thumbnail"
                        />
                    </div>

                    <div class="modal-footer justify-content-center">
                        <router-link
                            :to="{ name: 'thumbnail' }"
                            type="button"
                            class="mr-1 btn btn-sucess block"
                        >
                            <i
                                class="fa fa-long-arrow-left"
                                aria-hidden="true"
                            ></i>
                            Back
                        </router-link>
                        <button
                            @click.prevent="create"
                            class="btn btn-primary block"
                        >
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import API from "../../common/API/API";
import jwtToken from "../../common/token";
import ApiService from "../../common/api.service";
export default {
    methods: {
        create() {
            const formData = new FormData();
          formData.append("name", this.$refs.name.value);;
          formData.append("thumbnail", this.$refs.thumbnail.files[0]);
            if (jwtToken.getToken()) {
                ApiService.setHeader();
                ApiService.post("thumbnail", formData)
                    .then(res => {
                        this.$router.push({ name: "thumbnail" });
                        setTimeout(() => {
                            this.$toast.success(
                                "Add a new thumbnail image successfully",
                                {
                                    position: "bottom-right",
                                    duration: 5000
                                }
                            );
                        }, 1300);
                    })
                    .catch(error => {
                        if (error.response.data.errors.name) {
                            setTimeout(() => {
                                this.$toast.error(
                                    error.response.data.errors.name[0],
                                    {
                                        position: "top-right",
                                        duration: 3000
                                    }
                                );
                            }, 1000);
                        }
                          if (error.response.data.errors.thumbnail) {
                            setTimeout(() => {
                                this.$toast.error(
                                    error.response.data.errors.thumbnail[0],
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
};
</script>
