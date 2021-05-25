<template>
    <div id="posts">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <li class="breadcrumb-item active">
                        <router-link :to="{ name: 'scan-3d' }">
                            Scan 3D
                        </router-link>
                    </li>
                    <li class="breadcrumb-item">{{ scan3d.name }}</li>
                    <li class="breadcrumb-item">Update</li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-codepen"></i> Scan 3D</h1>
            </div>
        </div>
        <div class="col-md-12 px-0">
            <div class="">
                <form @submit.prevent="onUpdate()">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            ref="name"
                            class="form-control"
                            id="name"
                            :value="scan3d.name"
                            placeholder="Enter the scan 3D project name"
                        />
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input
                            class="form-control"
                            id="title"
                            ref="title"
                            type="text"
                            :value="scan3d.title"
                            placeholder="Enter the scan 3D project title"
                        />
                    </div>
                    <div class="form-group">
                        <label for="favicon">Favicon</label>
                        <input
                            class="form-control"
                            id="favicon"
                            ref="favicon"
                            type="file"
                        />
                    </div>
                    <div class="form-group">
                        <label for="model_code">Model code</label>
                        <input
                            class="form-control"
                            id="model_code"
                            ref="model_code"
                            type="text"
                            :value="scan3d.model_code"
                            placeholder="Enter the scan 3D project model code"
                        />
                    </div>
                    <div class="modal-footer justify-content-center">
                        <router-link
                            :to="{ name: 'scan-3d' }"
                            type="button"
                            class="mr-1 btn btn-sucess block"
                        >
                            <i
                                class="fa fa-long-arrow-left"
                                aria-hidden="true"
                            ></i>
                            Back
                        </router-link>
                        <button type="submit" class="btn btn-info block">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
    data() {
        return {
            data: {
                name: "",
                title: "",
                favicon: null,
                model_code: ""
            }
        };
    },
    computed: {
        ...mapGetters(["getScan3dById"]),
        scan3d() {
            return this.getScan3dById(this.$route.params.id);
        }
    },
    methods: {
        onUpdate() {
            const formData = new FormData();
            formData.append("name", this.$refs.name.value);
            formData.append("title", this.$refs.title.value);
            formData.append("favicon", this.$refs.favicon.files[0]);
            formData.append("model_code", this.$refs.model_code.value);

            this.$store
                .dispatch("update_scan3d", {
                    id: this.scan3d.id,
                    data: formData
                })
                .then(response => {
                    this.$router.push({ name: "scan-3d" });
                    setTimeout(() => {
                        this.$toast.success("Edit  scan 3d successfully", {
                            position: "bottom-right",
                            duration: 2000
                        });
                    }, 1000);
                })
                .catch(error => {
                  
                    if (error.response.data.errors.name) {
                        setTimeout(() => {
                            this.$toast.warning(
                                error.response.data.errors.name[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 1000);
                    }
                    if (error.response.data.errors.title) {
                        setTimeout(() => {
                            this.$toast.warning(
                                error.response.data.errors.title[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 1000);
                    }
                    if (error.response.data.errors.model_code) {
                        setTimeout(() => {
                            this.$toast.warning(
                                error.response.data.errors.model_code[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 1000);
                    }
                        if (error.response.data.errors.favicon) {
                        setTimeout(() => {
                            this.$toast.error(
                                error.response.data.errors.favicon[0],
                                {
                                    position: "top-right",
                                    duration: 3000
                                }
                            );
                        }, 3000);
                    }
                });
        }
    }
};
</script>
