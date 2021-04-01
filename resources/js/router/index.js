
import Vue          from 'vue'
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

import loginComponent from '../components/Auth/loginComponent'
import HomeComponent from '../components/HomeComponent'
import PageNotFound from '../components/PageNotFound.vue'
Vue.use(Router)
export default new Router({
        mode: 'history',
   
            routes: [
            {
                path: "/admin/login",
                name: 'login',
                component: loginComponent,
            },
                {
                    path: '/admin/page',
                    name: 'index',
                    component: HomeComponent,
                    redirect: { name: 'page' },
                    props: true,
                    params: true,
                    beforeEnter: (to, from, next) => {
                        next()
                    },
                children: [
                    {
                        path: '',
                        name: "page",
                        component: PageComponent,
                        props: true,
                        params:true
                    },
                     {
                        path: 'create',
                        name: 'create',
                        component: CreateComponent,
                        props: true
                    },
                     {
                        path: ':postId/section',
                        name: 'section',
                        component: SectionComponent,
                        params: true,
                        props: true
                    },
                      {
                        path: 'update/:postId',
                        name: 'update',
                        component: EditComponent,
                        params: true,
                        props: true
                    },
                    {
                        path: ':postId/create',
                        name: 'section_create',
                        component: CreateSectionComponent,
                        params: true,
                        props: true
                    },
                       {
                        path: 'section/:sectionId/update',
                        name: 'section.update',
                        component: SectionEditComponent,
                        params: true,
                        props:  true 
                            
                    },
                    {
                        path: 'section/:sectionId/content',
                        name: 'content',
                        component: ContentComponent,
                        params: true,
                        props:  true 
                            

                    },
                        {
                        path: 'section/:sectionId/content/create',
                        name: 'content_create',
                        component: CreateContentComponent,
                        params: true,
                        props:  true 
                            

                    },
                        {
                        path: 'content/:contentId/update',
                        name: 'content.update',
                        component: EditContentComponent,
                        params: true,
                        props:  true 
                            

                    },
         
                  
                    
                ]
            },
                 {
                path: '*',
                component: PageNotFound,
              
            },
     
         
            
        ],
});
