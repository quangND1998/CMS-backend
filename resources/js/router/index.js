import Vue from "vue";
import Router from "vue-router";
import HomeComponent from "../components/HomeComponent";
import PageNotFound from "../components/PageNotFound.vue";

import Scan3D from "../components/3d-scan/Index.vue";
import CreateScan3D from "../components/3d-scan/Create.vue";
import UpdateScan3D from "../components/3d-scan/Update.vue";


import pageRouter from './pageRouter/index';
import theloaiRouter from './BlogRouter/theloai';
import loaitinRouter from './BlogRouter/loatin';
import tintucRouter from './BlogRouter/tintuc';
import slideRouter from './BlogRouter/slide';
import contactRouter from './BlogRouter/contact';
import commentRouter from './BlogRouter/comment';
import userRouter from './BlogRouter/users';
Vue.use(Router);

export default new Router({
    mode: "history",

    routes: [
        ...pageRouter,
        ...theloaiRouter,
        ...loaitinRouter,
        ...tintucRouter,
        ...slideRouter,
        ...contactRouter,
        ...commentRouter,
        ...userRouter,
    
        {
            path: "*",
            component: PageNotFound
        },
        {
            path: "/admin/scan-3d",
            component: HomeComponent,
            redirect: {
                name: "scan-3d"
            },
            children: [
                {
                    path: "",
                    name: "scan-3d",
                    component: Scan3D,
                    props: true,
                    params: true
                },
                {
                    path: "create",
                    name: "scan-3d.create",
                    component: CreateScan3D,
                    props: true,
                    params: true
                },
                {
                    path: ":id/update",
                    name: "scan-3d.update",
                    component: UpdateScan3D,
                    props: true,
                    params: true
                }
            ]
        }
    ]
});