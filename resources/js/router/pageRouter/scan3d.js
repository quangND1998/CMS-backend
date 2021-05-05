
import Scan3D from "../../components/3d-scan/Index.vue";
import CreateScan3D from "../../components/3d-scan/Create.vue";
import UpdateScan3D from "../../components/3d-scan/Update.vue";
import HomeComponent from '../../components/HomeComponent';

export default [
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
      
    },
];