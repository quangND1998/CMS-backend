import LoaiTinComponent from "../../Blog/LoaiTin/LoaiTinComponent";
import CreateLoaiTinComponent from "../../Blog/LoaiTin/CreatLoaiTinComponent";
import UpdateLoaiTinComponent from "../../Blog/LoaiTin/UpdateLoaiTinComponent";
import HomeComponent from '../../components/HomeComponent';

export default [
    {
        path: "/admin/loaitin",
        component: HomeComponent,
        redirect: {
            name: "loaitin"
        },
        children: [{
                path: "",
                name: "loaitin",
                component: LoaiTinComponent,
                props: true,
                params: true
            },
            {
                path: "create",
                name: "loaitin.create",
                component: CreateLoaiTinComponent,
                props: true,
                params: true
            },
            {
                path: ":loaitinId/update",
                name: "loaitin.update",
                component: UpdateLoaiTinComponent,
                props: true,
                params: true
            }
        ]
    },
];