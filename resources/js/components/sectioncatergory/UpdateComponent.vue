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
                    v-model="category.title"
                    class="form-control"
                    id="title"
                    placeholder="Enter name"
                    required
                />
            </div>
           
             <div class="form-group">
                <input
                    type="title"
                    v-model="category.title_vn"
                    ref="title_vn"
                    class="form-control"
                    id="title"
                    placeholder="Enter name  VietNamese"
                    required
                />
            </div>


            <!-- {{category}} -->
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
import { SECTION_CATEGORY_EDIT,GET_SECTION_CATEGORY_ID } from "../store/actions/sectioncategory";
import { mapGetters } from "vuex";
import store from "../store/store";

export default {
       mounted() {
        this.getPost();
    },
    props: {
        postId: {
            required: true
        },
        sectionId:{
            required: true
        },
        categoryId:{
            required:true
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
            this.$store.dispatch(SECTION_CATEGORY_EDIT, this.categoryId)
            .then(response => {
                        this.successful = true;
                        this.error = false;
                        this.errors = [];
                         this.$router.push({
                            name: "section_category",
                            params: { posId: this.postId ,sectionId:this.sectionId}
                        });
                        // console.log(response)
              

                    })
                    .catch(error => {
                            // console.log(error)
                        if (!_.isEmpty(error.response)) {
                        if ((error.response.status == 422)) {
                            this.errors = error.response.data.errors;
                            this.successful = false;
                            this.error = true;
                        }
                        }
                    });;
      
          
            this.$refs.title.value = "";

        },
        getPost() {
            this.$store.dispatch(GET_SECTION_CATEGORY_ID, this.categoryId);
        }
        ,
         bindingData(data){
            // console.log(data.type)
            // console.log()
         
           for(let i=0 ;i<this.types.length;i++){
               if(this.types[i].value == data.type){
                   return this.types[i].text
               }
           }
        }
    }
};
</script>

<style></style>
