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
                    ref="title_vn"
                    class="form-control"
                    id="title"
                    placeholder="Enter name  VietNamese"
                    required
                />
            </div>


            {{category}}
            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" v-model="category.type">
                <option v-for="type in types" :key="type.index" v-bind:value="type.value" >{{type.text}}</option>
            
         
            </select>
              </div>

            <router-link :to="{ name: 'section_category',    params: { posId: this.postId ,sectionId:this.sectionId} }" class="btn btn-white block">
                Back
            </router-link>
            <button
                type="submit"
                @click.prevent="create"
                class="btn btn-primary block"
            >
                Submit
            </button>
        </form>
    </div>
</template>

<script>
import { PAGE_RESET_STATE } from "../store/actions/page";
import { CREATE_SECTION_CATEGORY  } from "../store/actions/sectioncategory";
import { mapGetters } from "vuex";
import store from "../store/store";
export default {
    props: {
        postId: {
            required: true
        },
        sectionId:{
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
        ...mapGetters(["category","types"])
    },
    methods: {
        create() {
            this.category.title = this.$refs.title.value;
            this.category.title_vn = this.$refs.title_vn.value;
            
            this.$store.dispatch(CREATE_SECTION_CATEGORY, this.sectionId)
            .then(response => {
                        this.successful = true;
                        this.error = false;
                        this.errors = [];
                         this.$router.push({
                            name: "section_category",
                            params: { posId: this.postId ,sectionId:this.sectionId}
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
            this.$refs.title_vn.value = "";
        }
    }
};
</script>

<style></style>