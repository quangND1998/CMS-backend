<template>
    <div class="">
        <div class="app-title">
            <div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item">
                        <i class="fa fa-home fa-lg"></i>
                    </li>

                    <li class="breadcrumb-item active">
                        <router-link :to="{ name: 'page' }">
                            Page list
                        </router-link>
                    </li>
                    <li class="breadcrumb-item text-danger">Page name</li>
                    <li class="breadcrumb-item">Section</li>
                    <li class="breadcrumb-item">Create</li>
                </ul>
                <h1 class="mt-2"><i class="fa fa-th-list"></i> Section list</h1>
            </div>
        </div>

        <form>
            <div
                :class="[
                    'form-group m-1 p-3',
                    successful ? 'alert-success' : ''
                ]"
            >
                <span v-if="successful" class="label label-sucess"
                    >Published!</span
                >
            </div>
            <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
                <span v-if="errors.title" class="label label-danger">
                    {{ errors.title[0] }}
                </span>
                <span v-if="errors.text" class="label label-danger">
                    {{ errors.text[0] }}
                </span>
                <span v-if="errors.sub_title" class="label label-danger">
                    {{ errors.sub_title[0] }}
                </span>
            </div>

            <div class="form-group">
                <input
                    type="title"
                    ref="title"
                    class="form-control"
                    id="title"
                    placeholder="Enter name"
                    required
                />
            </div>

            <div class="form-group">
                <input
                    type="title"
                    ref="sub_title"
                    class="form-control"
                    id="sub_title"
                    placeholder="Enter sub title"
                    required
                />
            </div>

            <div class="form-group">
                <textarea
                    class="form-control"
                    ref="text"
                    id="text"
                    placeholder="Enter a body"
                    rows="6"
                    required
                ></textarea>
            </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" v-model="section.template">
                <option v-for="option in options" :key="option.index" >{{option.text}}</option>
            
         
            </select>
              </div>

            <div class="modal-footer justify-content-center">
                <router-link
                    :to="{ name: 'section', params: { postId: postId } }"
                    class="btn btn-white block"
                >
                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                    Back
                </router-link>
                <button
                    type="submit"
                    @click.prevent="create"
                    class="btn btn-primary block"
                >
                    Create
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import { PAGE_RESET_STATE } from "../store/actions/page";
import { CREATE_SECTION } from "../store/actions/section";
import { mapGetters } from "vuex";
import store from "../store/store";

export default {
    props: {
        postId: {
            required: true
        }
    },
    data() {
        return {
            error: false,
            successful: false,
            errors: []
        };
    },
    async beforeRouteLeave(to, from, next) {
        await store.dispatch(PAGE_RESET_STATE);
        next();
    },

    computed: {
        ...mapGetters(["section", "sections","options"])
    },
    methods: {
        create() {
            this.section.title = this.$refs.title.value;
            this.section.text = this.$refs.text.value;
            this.section.sub_title = this.$refs.sub_title.value;
    
            this.$store.dispatch(CREATE_SECTION, this.postId)
            .then(response => {
                        this.successful = true;
                        this.error = false;
                        this.errors = [];
                         this.$router.push({
                            name: "section",
                            params: { posId: this.postId }
                        });

                    })
                    .catch(error => {
                
                        if (!_.isEmpty(error.response)) {
                        if ((error.response.status == 422)) {
                            this.errors = error.response.data.errors;
                            this.successful = false;
                            this.error = true;
                        }
                        }
                    });;
      
          
            this.$refs.title.value = "";
            this.$refs.text.value = "";
            this.$refs.sub_title.value = "";
        }
    }
};
</script>

<style></style>
