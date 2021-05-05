import TinTucComponent from "../../Blog/TinTuc/TinTucComponent";
import CreateTinTucComponent from "../../Blog/TinTuc/CreateTinTucComponent";
import UpdateTinTucComponent from "../../Blog/TinTuc/UpdateTinTucComponent";
import HomeComponent from '../../components/HomeComponent';

export default [
    {
        path: "/admin/tintuc",
        component: HomeComponent,
        redirect: {
            name: "tintuc"
        },
        children: [{
                path: "",
                name: "tintuc",
                component: TinTucComponent,
                props: true,
                params: true
            },
            {
                path: "create",
                name: "tintuc.create",
                component: CreateTinTucComponent,
                props: true,
                params: true
            },
            {
                path: ":tintucId/update",
                name: "tintuc.update",
                component: UpdateTinTucComponent,
                props: true,
                params: true
            }
        ]
    }
];