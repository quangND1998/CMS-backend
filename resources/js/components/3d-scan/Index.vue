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
                        <!-- <router-link :to="{ name: 'scan-3d' }"> -->
                        Scan 3D
                        <!-- </router-link> -->
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
                                <th>Model code</th>
                                <th>Preview link</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Aristino Trần Phú</td>
                                <td>VR Showroom Aristino Tran Phu</td>
                                <td>mSeF8Vh1qLn</td>
                                <td><a href="" target="_blank"><i class="fa fa-link" aria-hidden="true"></i>View</a></td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-xs btn-info"
                                    >
                                        <i
                                            class="fa fa-pencil mr-0"
                                            aria-hidden="true"
                                        ></i>
                                    </button>
                                    <button
                                        type="button"
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
export default {};
</script>
