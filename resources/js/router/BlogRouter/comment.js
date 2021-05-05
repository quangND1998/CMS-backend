import CommentComponent from "../../Blog/Comment/CommentComponent";
import HomeComponent from '../../components/HomeComponent';

export default [
    {
        path: "/admin/comment",
        component: HomeComponent,
        redirect: {
            name: "comment"
        },
        children: [{
            path: "",
            name: "comment",
            component: CommentComponent,
            props: true,
            params: true
        }]
    },
];