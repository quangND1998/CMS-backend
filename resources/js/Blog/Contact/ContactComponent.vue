<template>
  <div>{{contacts}}</div>
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
            this.fetchSlide();
        }
    }
}
</script>

<style>

</style>