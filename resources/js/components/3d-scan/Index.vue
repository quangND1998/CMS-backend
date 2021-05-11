<template>
    <div id="posts">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <li class="breadcrumb-item">
                        Scan 3D
                    </li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-codepen"></i> Scan 3D</h1>
            </div>
            <router-link
                :to="{ name: 'scan-3d.create' }"
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
                                <th>Title</th>
                                <th>Favicon</th>
                                <th>Model code</th>
                                <th>Preview link</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(scan3d, index) in scan3ds" :key="scan3d.id">
                                <td>{{ index + 1 }}</td>
                                <td>{{ scan3d.name }}</td>
                                <td>{{ scan3d.title }}</td>
                                <td><img :src="scan3d.favicon" alt="Logo" style="width: 40px"></td>
                                <td>{{ scan3d.model_code }}</td>
                                <td>
                                    <a :href="'project/'+scan3d.slug+'.html'" target="_blank"
                                        ><i
                                            class="fa fa-link"
                                            aria-hidden="true"
                                        ></i
                                        >View</a
                                    >
                                </td>
                                <td>
                                    <router-link
                                        :to="{
                                            name: 'scan-3d.update',
                                            params: {
                                                id: scan3d.id
                                            }
                                        }"
                                        class="btn btn-xs btn-info"
                                    >
                                        <i
                                            class="fa fa-pencil mr-0"
                                            aria-hidden="true"
                                        ></i>
                                    </router-link>
                                    <!-- <button
                                        type="button"
                                        class="btn btn-xs btn-info"
                                    >
                                        <i
                                            class="fa fa-pencil mr-0"
                                            aria-hidden="true"
                                        ></i>
                                    </button> -->
                                    <button
                                        type="button"
                                        class="btn btn-xs btn-danger"
                                        data-toggle="modal"
                                        :data-target="'#deleteModal' + scan3d.id"
                                    >
                                        <i
                                            class="fa fa-trash mr-0"
                                            aria-hidden="true"
                                        ></i>
                                    </button>
                                    <!-- Modal Delete -->
                                    <div
                                        class="modal fade"
                                        :id="'deleteModal' + scan3d.id"
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
                                                        @click="deleteScan3d(scan3d.id)"
                                                        data-dismiss="modal"
                                                    >
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Delete -->
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
import { mapGetters } from 'vuex'

export default {
    created() {
        this.$store.dispatch('get_all_scan3d')
    },
    computed: {
        ...mapGetters([
            'scan3ds'
        ])
    },
    methods: {
        deleteScan3d(id) {
            this.$store.dispatch('delete_scan3d', id).then(response => {
                setTimeout(() => {
                        this.$toast.success(
                            "Delete scan 3D successfully",
                            {
                                position: "bottom-right",
                                duration: 5000
                            }
                        );
                    }, 1300);
            })
        }
    }
};
</script>
