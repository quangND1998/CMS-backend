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
                            v-model="name"
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
                            name="thumbnail"
                            class="form-control"
                            id="thumbnail"
                            @change="onFileSelected"
                        />
                    </div>
                    <!-- <div class="form-group custom-file mb-3">
                        <input
                            type="file"
                            name="thumbnail"
                            id="thumbnail"
                            ref="thumbnail"
                            class="custom-file-input"
                            @change="onFileSelected"
                        />
                        <label class="custom-file-label">Choose file...</label>
                    </div> -->

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
                            @click.prevent="onSubmit"
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

export default {
    data() {
        return {
            name: "",
            selectedFile: null
        };
    },
    methods: {
        onFileSelected(e) {
            this.selectedFile = e.target.files[0];
        },
        onSubmit() {
            const data = new FormData();
            data.append("name", this.name);
            data.append("thumbnail", this.selectedFile, this.selectedFile.name);

            API.post("thumbnail", data).then(res => {
                if (res.status === 200) {
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
                }
            });
        }
    }
};
</script>
