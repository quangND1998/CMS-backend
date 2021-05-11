import Vue from "vue";
import Router from "vue-router";
import HomeComponent from "../components/HomeComponent";
import PageNotFound from "../components/PageNotFound.vue";



import pageRouter from './pageRouter/index';
import theloaiRouter from './BlogRouter/theloai';
import loaitinRouter from './BlogRouter/loatin';
import tintucRouter from './BlogRouter/tintuc';
import slideRouter from './BlogRouter/slide';
import contactRouter from './BlogRouter/contact';
import commentRouter from './BlogRouter/comment';
import userRouter from './BlogRouter/users';
import scan3dRouter from './pageRouter/scan3d';
import thumbRouter from './pageRouter/thumb';
// Scan 3D

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
        ...scan3dRouter,
        ...thumbRouter,
        
        {
            path: "*",
            component: PageNotFound
        },
       
   
    ]
});
