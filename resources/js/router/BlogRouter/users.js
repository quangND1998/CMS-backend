import UserComponent from "../../components/User/UserComponent";
import CreateUserComponent from "../../components/User/CreateUserComponent";
import UpdateUserComponent from "../../components/User/UpdateUserComponent";
import HomeComponent from '../../components/HomeComponent';

export default [
    {
        path: "/admin/user",
        component: HomeComponent,
        redirect: {
            name: "user"
        },
        children: [{
                path: "",
                name: "user",
                component: UserComponent,
                props: true,
                params: true
            },
            {
                path: "create",
                name: "user.create",
                component: CreateUserComponent,
                props: true,
                params: true
            },
            {
                path: ":userId/update",
                name: "user.update",
                component: UpdateUserComponent,
                props: true,
                params: true
            }
        ]
    },
];