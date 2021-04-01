<template>
      <div class="container">
                  <div>
                <router-link :to="{ name: 'section', params: { postId : id }  }">
                    <button type="button" class="p-1 mx-3 float-left btn btn-sucess">
                      BACK
                    </button>
                 </router-link>
            </div>
   <form>
          <div :class="['form-group m-1 p-3', (successful ? 'alert-success' : '')]">
            <span v-if="successful" class="label label-sucess">Published!</span>
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
            <input type="title" ref="title" v-model="section.title" class="form-control" id="title" placeholder="Enter name" required>
          </div>

          <div class="form-group">
            <textarea class="form-control" v-model="section.text" ref="text" id="text" placeholder="Enter a body" rows="8" required></textarea>
          </div>
        
          <div class="form-group">
            <input type="title" ref="sub_title" v-model="section.sub_title" class="form-control" id="sub_title" placeholder="Enter sub title" required>
          </div>
         

          <button type="submit" @click.prevent="update" class="btn btn-primary block">
            Submit
          </button>
        </form>
      </div>
</template>

<script>
import {GET_SECTION_ID ,SECTION_EDIT} from '../store/actions/section'
import {PAGE_RESET_STATE} from '../store/actions/page'
import { mapGetters } from "vuex";
import store from '../store/store';
 export default {
      mounted() {
        this.getPost();
      },
      props: {
        sectionId: {
          required: true
        },
        id :{
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
       computed:{
         ...mapGetters(["section"])
      },
      async beforeRouteLeave(to, from, next) {
        await store.dispatch(PAGE_RESET_STATE);
        next();
      },
      methods: {
        update() {
        this.section.title = this.$refs.title.value;
            this.section.text = this.$refs.text.value;
            this.section.sub_title = this.$refs.sub_title.value;
            this.$store.dispatch(SECTION_EDIT,this.section.id)
            this.$router.push({name:'section', params: { postId: this.id } });

        },
        getPost() {
            this.$store.dispatch(GET_SECTION_ID,this.sectionId);
        } 
      }
    };
</script>

<style>

</style>

 