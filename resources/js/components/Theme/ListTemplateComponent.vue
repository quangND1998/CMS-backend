<template>
<div id="theme">
        
        
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>
                    <!-- <li class="breadcrumb-item">Tables</li> -->
                    <li class="breadcrumb-item active">
                        <router-link :to="{ name: 'theme' }">
                            Theme list
                        </router-link>
                    </li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-th-list"></i> Page list</h1>
            </div>
            <router-link :to="{ name: 'template_create' }" class="btn btn-success">
                ADD NEW
            </router-link>
        </div>
       
        <div>
        
        </div>
      
        <div class="col-md-12 px-0">
            <div class="">
                <!-- <div class="d-flex">
                    <h3 class="tile-title">Page list</h3>
                    <router-link
                        :to="{ name: 'create' }"
                        class="btn btn-success"
                    >
                        ADD NEW
                    </router-link>
                </div> -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Template</th>
                                <th>link_code</th>
                                <th>image_tmeplate</th>
                                <th>Type</th>
                             
                             
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(theme, index) in themes" :key="theme.id">
                                <td class="align-middle">{{ index + 1 }}</td>
                                <td class="align-middle">
                                    {{theme.title}}
                                </td>
                                     
                                <td class="align-middle">
                                    {{ theme.link_code }}
                                </td>
                                <td v-if="theme.image_template" class="align-middle">
                                    <img
                                        :src="theme.image_template"
                                        style="width: 300px"
                                    />
                                </td>
                                <td v-else><span class="text-success">Updating...</span></td>
                                <td>{{theme.type}}</td>
                                <td class="align-middle">
                                    <router-link
                                        :to="{
                                            name: 'template_update',
                                            params: { themeId: theme.id }
                                        }"
                                        class="btn btn-xs btn-info"
                                    >
                                            <i class="fa fa-pencil mr-0" aria-hidden="true"></i>
                                    </router-link>
                                    <button
                                        type="button"
                                        @click="deleteTheme(theme.id)"
                                        class="btn btn-xs btn-danger"
                                    >
                                       <i class="fa fa-trash mr-0" aria-hidden="true"></i>
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
import store from "../store/store";
import {
    FETCH_THEMES,
    THEME_DELETE,
    theme_RESET_STATE
} from "../store/actions/theme";

export default {
    
    components: {},
    created() {
        this.fetchThemes();
    },
    props: {
        msg: {}
    },
    computed: {
        ...mapGetters(["themes", "isAuthenticated","isLoading"])
    },
    data() {
        return {};
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(theme_RESET_STATE);
        next();
    },

    methods: {
        fetchThemes() {
            this.$store.dispatch(FETCH_THEMES);
        },
        deleteTheme(id) {
            this.$store.dispatch(THEME_DELETE, id);
            this.fetchThemes();
        }
    }
};
</script>

<style>

</style>