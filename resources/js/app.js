
require('./bootstrap');

import Vue          from 'vue'
import VueRouter    from 'vue-router'
import HomeComponent from './components/HomeComponent.vue'
import PageComponent from './components/pages/PageComponent.vue'
import EditComponent from './components/pages/EditComponent.vue'
import CreateComponent from './components/pages/CreateComponent.vue'
import SectionComponent from './components/section/SectionComponent.vue'
import CreateSectionComponent from './components/section/CreateSectionComponent'
import SectionEditComponent from './components/section/SectionEditComponent.vue'
Vue.use(VueRouter)

    const router = new VueRouter({
        mode: 'history',
        routes: [
            {
                path: '/admin/page',
                name: 'page',
                component: PageComponent,
                props: true,
                params: true,
                // children: [
                //      {
                //         path: ':postId/section',
                //         name: 'section',
                //         component: SectionComponent,
                //         params: true,
                //         props: true
                //     },
                  
                    
                // ]
            },
            {
                path: '/admin/create',
                name: 'create',
                component: CreateComponent,
                props: true
            },
            {
                path: '/admin/update/:postId',
                name: 'update',
                component: EditComponent,
                params: true,
                props: true
            },
                 {
                path: '/admin/page/:postId/section',
                name: 'section',
                component: SectionComponent,
                params: true,
                props: true
            },
            {
                path: '/admin/page/:postId/create',
                name: 'section_create',
                component: CreateSectionComponent,
                params: true,
                props: true
            },
            {
                path: '/admin/section/:sectionId/update',
                name: 'section.update',
                component: SectionEditComponent,
                params: true,
                props:  true 
                     
                 }
        ],
    });
const app = new Vue({
        el: '#app',
        components: { HomeComponent },
        router
    });
