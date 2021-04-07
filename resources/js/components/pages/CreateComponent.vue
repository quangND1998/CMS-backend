<template>
 <div class="container">
                   
                  <button @click="$router.push({name:'page'})" type="button" class="p-1 mx-3 float-left btn btn-sucess">
                    BACK
                    </button>
              <!-- {{page}}   -->
        <form @submit.prevent="create()">
          <div :class="['form-group m-1 p-3', (successful ? 'alert-success' : '')]">
            <span v-if="successful" class="label label-sucess">Published!</span>
          </div>
          <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
            <span v-if="errors.name" class="label label-danger">
              {{ errors.name[0] }}
            </span>
            <span v-if="errors.description" class="label label-danger">
              {{ errors.description[0] }}
            </span>
            <span v-if="errors.image" class="label label-danger">
              {{ errors.image[0] }}
            </span>
          </div>

          <div class="form-group">
            <input type="text" ref="name"  class="form-control" id="name" placeholder="Enter name" required>
          </div>

          <div class="form-group">
            <textarea class="form-control"    ref="description" id="description" placeholder="Enter a body" rows="8" required></textarea>
          </div>

          <div class="custom-file mb-3">
            <input type="file" ref="image"     name="image" class="custom-file-input" id="image" required>
            <label class="custom-file-label" >Choose file...</label>
          </div>

          <button type="submit"  class="btn btn-primary block">
            Submit
          </button>
        </form>
      </div>
  
</template>

<script>
import {PAGE_PUBLISH,PAGE_RESET_STATE } from '../store/actions/page';
import { mapGetters } from "vuex";
import store        from '../store/store';

export default {
  props: {
        
      },
      data() {
        return {
          error: false,
          successful: false,
          errors: []
        };
      },
      computed: {
        ...mapGetters(["page"])
      },
       beforeRouteLeave(to, from, next) {
       store.dispatch(PAGE_RESET_STATE);
        next();
      },
      methods: {
        create() {
          const formData = new FormData()
          formData.append("name", this.$refs.name.value);
          formData.append("description", this.$refs.description.value);

          formData.append("image", this.$refs.image.files[0]);

       
          // this.page.name = formData.get('name')
          // this.page.description = formData.get('description')
          // this.page.image = formData.get('image')

          this.$store.dispatch(PAGE_PUBLISH,formData).then(({ data }) => {
                this.$refs.name.value = "";
          this.$refs.description.value = "";

         this.$router.push({name:'page'});
        })
        .catch(({ response }) => {
         this.errors = response.data.errors;
        });

          // axios
          //   .post("/api/page", formData)
          //   .then(response => {
          //     this.successful = true;
          //     this.error = false;
          //     this.errors = [];
          //     this.$router.push({name:'page'});
          //   })
          //   .catch(error => {
          //     if (!_.isEmpty(error.response)) {
          //       if ((error.response.status == 422)) {
          //         this.errors = error.response.data.errors;
          //         this.successful = false;
          //         this.error = true;
          //       }
          //     }
          //   });

      

        }
      }
}
</script>

<style>

</style>

