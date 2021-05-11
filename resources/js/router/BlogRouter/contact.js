import ContactComponent from "../../Blog/Contact/ContactComponent";
import HomeComponent from '../../components/HomeComponent';

export default [
    {
        path: "/admin/contact",
        component: HomeComponent,
        redirect: {
            name: "contact"
        },
        children: [{
            path: "",
            name: "contact",
            component: ContactComponent,
            props: true,
            params: true
        }]
    },
];