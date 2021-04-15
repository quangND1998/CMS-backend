import Vue from 'vue'
import Router from 'vue-router'
import PageComponent from '../components/pages/PageComponent.vue'
import EditComponent from '../components/pages/EditComponent.vue'
import CreateComponent from '../components/pages/CreateComponent.vue'
import SectionComponent from '../components/section/SectionComponent.vue'
import CreateSectionComponent from '../components/section/CreateSectionComponent'
import SectionEditComponent from '../components/section/SectionEditComponent.vue'
import ContentComponent from '../components/Content/ContentComponent.vue';
import CreateContentComponent from '../components/Content/CreateContentComponent.vue'
import EditContentComponent from '../components/Content/EditContentComponent.vue'
import IndexSectionComponent from '../components/section/IndexSectionComponent.vue';
import loginComponent from '../components/Auth/loginComponent'
import HomeComponent from '../components/HomeComponent'
import PageNotFound from '../components/PageNotFound.vue'
import LandingComponent from '../components/landingpage/LandingComponent'
import IndexComponent from '../components/sectioncatergory/IndexComponent'
import CreateCategoryComponent from '../components/sectioncatergory/CreateComponent'
import UpdateCategoryComponent from '../components/sectioncatergory/UpdateComponent';
import ContentCateComponent from '../components/sectioncatergory/Item/ContentCateComponent';
import IndexCateComponent from '../components/sectioncatergory/Item/IndexCateComponent';
import CreateCateContentComponent from '../components/sectioncatergory/Item/CreateCateContentComponent';
import UpdateCateContentComponent from '../components/sectioncatergory/Item/UpdateCateContentComponent';
import CreateTemplateComponent from '../components/Theme/CreateTemplateComponent';
import ListTemplateComponent from '../components/Theme/ListTemplateComponent';
import EditTemplateComponent from '../components/Theme/EditTemplateComponent';



////BLog

///The Loai
import TheLoaiComponent from '../Blog/Theloai/TheLoaiComponent'
import CreateTheLoaiComponent from '../Blog/Theloai/CreateTheLoaiComponent'
import UpdateTheLoaiComponent from '../Blog/Theloai/UpdateTheLoaiComponent'

/// LoaiTIn 
import LoaiTinComponent from '../Blog/LoaiTin/LoaiTinComponent';
import CreateLoaiTinComponent from '../Blog/LoaiTin/CreatLoaiTinComponent';
import UpdateLoaiTinComponent from '../Blog/LoaiTin/UpdateLoaiTinComponent';

/// TinTuc
import TinTucComponent from '../Blog/TinTuc/TinTucComponent'
import CreateTinTucComponent from '../Blog/TinTuc/CreateTinTucComponent'
import UpdateTinTucComponent from '../Blog/TinTuc/UpdateTinTucComponent'

///Slide
import SlideComponent from '../Blog/Slide/SlideComponent'
import SlideCreateCompoent from '../Blog/Slide/SlideCreateCompoent'
import UpdateSildeComponent from '../Blog/Slide/UpdateSildeComponent'

///ConTact
import ContactComponent from '../Blog/Contact/ContactComponent'
Vue.use(Router)

export default new Router({
    mode: "history",

    routes: [

        {
            path: '/admin/theme',
            name: 'theme',
            component: HomeComponent,
            redirect: {
                name: "list"
            },
            children: [
                {
                    path:"",
                    name:"list",
                    component:ListTemplateComponent

                },
                {
                    path:"create",
                    name:"template_create",
                    component:CreateTemplateComponent 
                },
                {
                    path:":themeId/update",
                    name:"template_update",
                    component:EditTemplateComponent,
                    props: true,
                    params: true,
                }
        
            ]
        }

        ,
        {
            path: "/admin/login",
            name: "login",
            component: loginComponent
        },
        {
            path: "/admin/page",
            name: "index",
            component: HomeComponent,
            redirect: {
                name: "page"
            },
            props: true,
            params: true,
            beforeEnter: (to, from, next) => {
                next();
            },
            children: [{
                    path: "",
                    name: "page",
                    component: PageComponent,
                    props: true,
                    params: true
                },
                {
                    path: "create",
                    name: "create",
                    component: CreateComponent,
                    props: true
                },
                {
                    path: ":postId/section",

                    component: IndexSectionComponent,
                    params: true,
                    props: true,
                    children: [{
                            path: "",
                            name: "section",
                            component: SectionComponent,
                            props: true,
                            params: true
                        },
                        {
                            path: ":sectionId/item",
                            name: "content",
                            component: ContentComponent,
                            params: true,
                            props: true
                        },
                        {
                            path: ":sectionId/item/create",
                            name: "content_create",
                            component: CreateContentComponent,
                            params: true,
                            props: true
                        },
                        {
                            path: ":sectionId/section_category",
                            name: "section_category",
                            component: IndexComponent,
                            params: true,
                            props: true,

                        },
                        {
                            path: ":sectionId/section_category/create",
                            name: "section_category_create",
                            component: CreateCategoryComponent,
                            params: true,
                            props: true
                        },
                        {
                            path: ":sectionId/section_category/:categoryId/update",
                            name: "section_category_update",
                            component: UpdateCategoryComponent,
                            params: true,
                            props: true
                        },

                        {
                            path: ":contentId/update",
                            name: "content.update",
                            component: EditContentComponent,
                            params: true,
                            props: true
                        }

                        ///CateGory item
                        , {
                            path: ":sectionId/section_category/:categoryId",
                            name: "section_category_content",
                            component: ContentCateComponent,
                            params: true,
                            props: true,
                            children: [{
                                    path: "",
                                    name: "section_category_content",
                                    component: IndexCateComponent,
                                    params: true,
                                    props: true,
                                },
                                {
                                    path: "create",
                                    name: "section_category_content.create",
                                    component: CreateCateContentComponent,
                                    params: true,
                                    props: true,
                                },
                                {
                                    path: "update",
                                    name: "section_category_content.update",
                                    component: UpdateCateContentComponent,
                                    params: true,
                                    props: true,
                                }
                            ]

                        }
                    ]
                },

                {
                    path: ":postId/update",
                    name: "update",
                    component: EditComponent,
                    params: true,
                    props: true
                },
                {
                    path: ":postId/section/create",
                    name: "section_create",
                    component: CreateSectionComponent,
                    params: true,
                    props: true
                },
                {
                    path: ":postId/section/:sectionId/update",
                    name: "section.update",
                    component: SectionEditComponent,
                    params: true,
                    props: true
                }
            ]
        },
        {
            path: "*",
            component: PageNotFound
        },


        //BLog

        {
            path: '/admin/theloai',
            name: 'theloai',
            component: HomeComponent,
            redirect: {
                name: "theloai"
            },
            children: [
                {
                    path:"",
                    name:"theloai",
                    component:TheLoaiComponent,
                    props: true,
                    params: true,
                },
                {
                    path:"create",
                    name:"theloai.create",
                    component:CreateTheLoaiComponent,
                    props: true,
                    params: true,
                },
                {
                    path:":theloaiId/update",
                    name:"theloai.update",
                    component:UpdateTheLoaiComponent,
                    props: true,
                    params: true,
                }
        
            ]
        },
        {
            path: '/admin/loaitin',
            name: 'loaitin',
            component: HomeComponent,
            redirect: {
                name: "loaitin"
            },
            children: [
                {
                    path:"",
                    name:"loaitin",
                    component:LoaiTinComponent,
                    props: true,
                    params: true,
                },
                {
                    path:"create",
                    name:"loaitin.create",
                    component:CreateLoaiTinComponent,
                    props: true,
                    params: true,
                },
                {
                    path:":loaitinId/update",
                    name:"loaitin.update",
                    component:UpdateLoaiTinComponent,
                    props: true,
                    params: true,
                }
        
            ]
        },
        {
            path: '/admin/tintuc',
            name: 'tintuc',
            component: HomeComponent,
            redirect: {
                name: "tintuc"
            },
            children: [
                {
                    path:"",
                    name:"tintuc",
                    component:TinTucComponent,
                    props: true,
                    params: true,
                },
                {
                    path:"create",
                    name:"tintuc.create",
                    component:CreateTinTucComponent,
                    props: true,
                    params: true,
                },
                {
                    path:":tintucId/update",
                    name:"tintuc.update",
                    component:UpdateTinTucComponent,
                    props: true,
                    params: true,
                }
        
            ]
        },
        {
            path: '/admin/slide',
            name: 'slide',
            component: HomeComponent,
            redirect: {
                name: "slide"
            },
            children: [
                {
                    path:"",
                    name:"slide",
                    component:SlideComponent,
                    props: true,
                    params: true,
                },
                {
                    path:"create",
                    name:"slide.create",
                    component:SlideCreateCompoent,
                    props: true,
                    params: true,
                },
                {
                    path:":slideId/update",
                    name:"slide.update",
                    component:UpdateSildeComponent,
                    props: true,
                    params: true,
                }
        
            ]
        },
        {
            path: '/admin/contact',
            name: 'contact',
            component: HomeComponent,
            redirect: {
                name: "contact"
            },
            children: [
                {
                    path:"",
                    name:"contact",
                    component:ContactComponent,
                    props: true,
                    params: true,
                },
        
            ]
        }


    ]
});
