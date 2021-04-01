<template>
<div class="container">
            <router-link :to="{ name: 'section', params: { postId : postId } }">
                 
             <button type="button" class="p-1 mx-3 float-left btn btn-sucess">
                    BACK
                    </button>
       
                </router-link>
  
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
            <input type="title" ref="title" class="form-control" id="title" placeholder="Enter name" required>
          </div>

          <div class="form-group">
            <textarea class="form-control" ref="text" id="text" placeholder="Enter a body" rows="8" required></textarea>
          </div>
        
          <div class="form-group">
            <input type="title" ref="sub_title" class="form-control" id="sub_title" placeholder="Enter sub title" required>
          </div>
         

          <button type="submit" @click.prevent="create" class="btn btn-primary block">
            Submit
          </button>
        </form>
      </div>
</template>

<script>
import {PAGE_RESET_STATE } from '../store/actions/page';
import {CREATE_SECTION} from '../store/actions/section'
import { mapGetters } from "vuex";
import store        from '../store/store';


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
        ...mapGetters(["section","sections"])
      },
      methods: {
        create() {
            this.section.title = this.$refs.title.value;
            this.section.text = this.$refs.text.value;
            this.section.sub_title = this.$refs.sub_title.value;
            this.$store.dispatch(CREATE_SECTION,this.postId);
              this.sections.push({
              title: this.$refs.title.value,
              text: this.$refs.text.value,
              sub_title:  this.$refs.sub_title.value
            });
            this.$router.push({name:'section', params: { posId: this.postId } });

            this.$refs.title.value = "";
            this.$refs.text.value = "";
            this.$refs.sub_title.value = "";

        }
      }
}
</script>

<style>

</style>