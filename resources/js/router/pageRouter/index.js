import PageComponent from "../../components/pages/PageComponent.vue";
import EditComponent from "../../components/pages/EditComponent.vue";
import CreateComponent from "../../components/pages/CreateComponent.vue";
import SectionComponent from "../../components/section/SectionComponent.vue";
import CreateSectionComponent from "../../components/section/CreateSectionComponent";
import SectionEditComponent from "../../components/section/SectionEditComponent.vue";
import ContentComponent from "../../components/Content/ContentComponent.vue";
import CreateContentComponent from "../../components/Content/CreateContentComponent.vue";
import EditContentComponent from "../../components/Content/EditContentComponent.vue";
import IndexSectionComponent from "../../components/section/IndexSectionComponent.vue";
import loginComponent from "../../components/Auth/loginComponent";
import HomeComponent from "../../components/HomeComponent";
import PageNotFound from "../../components/PageNotFound.vue";
import LandingComponent from "../../components/landingpage/LandingComponent";
import IndexComponent from "../../components/sectioncatergory/IndexComponent";
import CreateCategoryComponent from "../../components/sectioncatergory/CreateComponent";
import UpdateCategoryComponent from "../../components/sectioncatergory/UpdateComponent";
import ContentCateComponent from "../../components/sectioncatergory/Item/ContentCateComponent";
import IndexCateComponent from "../../components/sectioncatergory/Item/IndexCateComponent";
import CreateCateContentComponent from "../../components/sectioncatergory/Item/CreateCateContentComponent";
import UpdateCateContentComponent from "../../components/sectioncatergory/Item/UpdateCateContentComponent";
import CreateTemplateComponent from "../../components/Theme/CreateTemplateComponent";
import ListTemplateComponent from "../../components/Theme/ListTemplateComponent";
import EditTemplateComponent from "../../components/Theme/EditTemplateComponent";
import ContentIndexComponent from "../../components/Content/ContentIndexComponent"

export default [
    {
        path: "/admin/theme",
        name: "theme",
        component: HomeComponent,
        redirect: {
            name: "list"
        },
        meta: {
            requiredRoles: 1
        },
        children: [{
                path: "",
                name: "list",
                component: ListTemplateComponent
            },
            {
                path: "create",
                name: "template_create",
                component: CreateTemplateComponent
            },
            {
                path: ":themeId/update",
                name: "template_update",
                component: EditTemplateComponent,
                props: true,
                params: true
            }
        ]
    },
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
                path: ":postId/update",
                name: "update",
                component: EditComponent,
                params: true,
                props: true
            },
        //   Section Route
            {
                path: ":postId/section",
                component: IndexSectionComponent,
                redirect: {
                    name: "section"
                },
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
                        path: "create",
                        name: "section_create",
                        component: CreateSectionComponent,
                        params: true,
                        props: true
                    },
                    {
                        path: ":sectionId/update",
                        name: "section.update",
                        component: SectionEditComponent,
                        params: true,
                        props: true
                    },

                   
                    {
                        path: ":sectionId/theme/:themeId/section_category",
                        name: "section_category",
                        component: IndexComponent,
                        params: true,
                        props: true
                    },
                    {
                        path: ":sectionId/theme/:themeId/section_category/create",
                        name: "section_category_create",
                        component: CreateCategoryComponent,
                        params: true,
                        props: true
                    },
                    {
                        path: ":sectionId/theme/:themeId/section_category/:categoryId/update",
                        name: "section_category_update",
                        component: UpdateCategoryComponent,
                        params: true,
                        props: true
                    },

                  ///content
                    {
                        path: ":sectionId/theme/:themeId/item",
                        component: ContentIndexComponent,
                        redirect: {
                            name: "content"
                        },
                        params: true,
                        props: true,
                        children :[  
                            {
                                path: "",
                                name: "content",
                                component: ContentComponent,
                                props: true,
                                params: true
                            },

                            {
                                path: "create",
                                name: "content_create",
                                component: CreateContentComponent,
                                params: true,
                                props: true
                            },
                            {
                                path: "update/:contentId",
                                name: "content.update",
                                component: EditContentComponent,
                                params: true,
                                props: true
                            },]  
                    },
                  

                    ///CateGory item
                    {
                        path: ":sectionId/theme/:themeId/section_category/:categoryId",
                        // name: "section_category_content",
                        component: ContentCateComponent,
                        params: true,
                        props: true,
                        children: [{
                                path: "",
                                name: "section_category_content",
                                component: IndexCateComponent,
                                params: true,
                                props: true
                            },
                            {
                                path: "create",
                                name: "section_category_content.create",
                                component: CreateCateContentComponent,
                                params: true,
                                props: true
                            },
                            {
                                path: "content/:contentId/update",
                                name: "section_category_content.update",
                                component: UpdateCateContentComponent,
                                params: true,
                                props: true
                            }
                        ]
                    }
                ]
            },

          
        ]
    },
];