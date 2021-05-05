import TheLoaiComponent from "../../Blog/Theloai/TheLoaiComponent";
import CreateTheLoaiComponent from "../../Blog/Theloai/CreateTheLoaiComponent";
import UpdateTheLoaiComponent from "../../Blog/Theloai/UpdateTheLoaiComponent";
import HomeComponent from '../../components/HomeComponent';

export default [
    {
        path: "/admin/theloai",

        component: HomeComponent,
        redirect: {
            name: "theloai"
        },
        children: [{
                path: "",
                name: "theloai",
                component: TheLoaiComponent,
                props: true,
                params: true
            },
            {
                path: "create",
                name: "theloai.create",
                component: CreateTheLoaiComponent,
                props: true,
                params: true
            },
            {
                path: ":theloaiId/update",
                name: "theloai.update",
                component: UpdateTheLoaiComponent,
                props: true,
                params: true
            }
        ]
    },
];