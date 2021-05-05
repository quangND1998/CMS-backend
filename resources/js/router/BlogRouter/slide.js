import SlideComponent from "../../Blog/Slide/SlideComponent";
import SlideCreateCompoent from "../../Blog/Slide/SlideCreateCompoent";
import UpdateSildeComponent from "../../Blog/Slide/UpdateSildeComponent";
import HomeComponent from '../../components/HomeComponent';

export default [
    {
        path: "/admin/slide",
        component: HomeComponent,
        redirect: {
            name: "slide"
        },
        children: [{
                path: "",
                name: "slide",
                component: SlideComponent,
                props: true,
                params: true
            },
            {
                path: "create",
                name: "slide.create",
                component: SlideCreateCompoent,
                props: true,
                params: true
            },
            {
                path: ":slideId/update",
                name: "slide.update",
                component: UpdateSildeComponent,
                props: true,
                params: true
            }
        ]
    },
];