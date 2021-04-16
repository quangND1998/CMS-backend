<template>
 <div id="posts">
   <div class="col-lg-12">
                <h1 class="page-header">
                  ConTact
                    <small>> Danh Sách</small>
                </h1>
            </div>

        <div class="col-md-12 px-0">
            
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                 <th>Message</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(contact, index) in contacts"
                                :key="contact.id"
                            >
                                <td class="align-middle">{{ index + 1 }}</td>
                                <td class="align-middle">
                                    {{ contact.contact_name }}
                                </td>

                                <td class="align-middle">
                                    {{ contact.contact_email }}
                                </td>
                                <td class="align-middle">
                                  {{contact.contact_message}}
                                </td>

                                <td class="align-middle">
                           
                                    <button
                                        type="button"
                                        @click="deleteContact(contact.id)"
                                        class="btn btn-xs btn-danger"
                                    >
                                        <i
                                            class="fa fa-trash mr-0"
                                            aria-hidden="true"
                                        ></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import store from "../../components/store/store";
import {
FETCH_CONTACT,CONTACT_DELETE,CONTACT_RESET_STATE
} from "../../components/store/contactModule/action";
export default {
   created() {
        this.tetchContact();
    },
    props: {
        msg: {}
    },
    computed: {
        ...mapGetters(["contacts"])
    },
    data() {
        return {};
    },
    beforeRouteLeave(to, from, next) {
        store.dispatch(CONTACT_RESET_STATE);
        next();
    },

    methods: {
        tetchContact() {
            this.$store.dispatch(FETCH_CONTACT);
        },
        deleteContact(id) {
            this.$store.dispatch(CONTACT_DELETE, id);
            this.tetchContact();
        }
    }
}
</script>

<style>

</style>