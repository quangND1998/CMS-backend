<template>
    <div id="posts">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <!-- <li class="breadcrumb-item">Tables</li> -->
                    <li class="breadcrumb-item">
                        Thumbnail
                    </li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-picture-o"></i> Thumbnail</h1>
            </div>
            <router-link v-if="thumbnail.length === 0"
                :to="{ name: 'thumbnail.create' }"
                class="btn btn-success"
            >
                ADD NEW
            </router-link>
        </div>
        <div class="col-md-12 px-0">
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Thumbnail</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(thumb, index) in thumbnail" :key="thumb.id">
                                <td class="align-middle">{{ index + 1 }}</td>
                                <td class="align-middle">
                                    {{ thumb.name }}
                                </td>
                                <td class="align-middle">
                                    <img
                                        :src="thumb.thumbnail"
                                        style="width: 120px"
                                        :alt="thumb.name"
                                    />
                                </td>
                                <td class="align-middle">
                                    <router-link
                                        :to="{
                                            name: 'thumbnail.update',
                                            params: {
                                                id: thumb.id
                                            }
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
                                        class="btn btn-xs btn-danger"
                                        data-toggle="modal"
                                        :data-target="'#deleteModal' + thumb.id"
                                    >
                                        <i
                                            class="fa fa-trash mr-0"
                                            aria-hidden="true"
                                        ></i>
                                    </button>
                                    <!-- modal -->
                                    <div
                                        class="modal fade"
                                        :id="'deleteModal' + thumb.id"
                                        tabindex="-1"
                                        aria-labelledby="exampleModalLabel"
                                        aria-hidden="true"
                                    >
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5
                                                        class="modal-title"
                                                        id="exampleModalLabel"
                                                    >
                                                        DELETE
                                                    </h5>
                                                    <button
                                                        type="button"
                                                        class="close"
                                                        data-dismiss="modal"
                                                        aria-label="Close"
                                                    >
                                                        <span aria-hidden="true"
                                                            >&times;</span
                                                        >
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to
                                                    delete ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        data-dismiss="modal"
                                                    >
                                                        Close
                                                    </button>
                                                    <button
                                                        type="button"
                                                        class="btn btn-danger"
                                                        @click="
                                                            deleteThumb(
                                                                thumb.id
                                                            )
                                                        "
                                                        data-dismiss="modal"
                                                    >
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal -->
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
import { AXIOS } from "../../common/http-common";

export default {
    data() {
        return {
            thumbnail: []
        };
    },
    created() {
        AXIOS.get("thumbnail").then(res => (this.thumbnail = res.data));
    },
    methods: {
        deleteThumb(id) {
            AXIOS.delete(`thumbnail/${id}`).then((res) => {
                if (res.status === 200) {
                    this.thumbnail = this.thumbnail.filter(
                    thumb => thumb.id !== id
                );
                setTimeout(() => {
                    this.$toast.success(
                        "Delete thumbnail image successfully",
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
