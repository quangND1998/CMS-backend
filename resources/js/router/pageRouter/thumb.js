import Thumbnail from "../../components/Thumbnail/Index.vue";
import CreateThumbnail from "../../components/Thumbnail/Create.vue";
import UpdateThumbnail from "../../components/Thumbnail/Update.vue";

import HomeComponent from '../../components/HomeComponent';

export default [{
    
        path: "/admin/thumbnail",
        component: HomeComponent,
        redirect: {
            name: "thumbnail"
        },
        children: [{
                path: "",
                name: "thumbnail",
                component: Thumbnail,
                props: true,
                params: true
            },
            {
                path: "create",
                name: "thumbnail.create",
                component: CreateThumbnail,
                props: true,
                params: true
            },
            {
                path: ":id/update",
                name: "thumbnail.update",
                component: UpdateThumbnail,
                props: true,
                params: true
            }
        ]
    
}, ];
