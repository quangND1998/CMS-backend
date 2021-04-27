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
                    <li class="breadcrumb-item">{{ $route.params.id }}</li>
                    <li class="breadcrumb-item">Update</li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-codepen"></i> Scan 3D</h1>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>
