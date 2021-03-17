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
            <input type="title" ref="title" class="form-control" id="title" placeholder="Enter name" required>
          </div>

          <div class="form-group">
            <textarea class="form-control" ref="text" id="text" placeholder="Enter a body" rows="8" required></textarea>
          </div>
        
          <div class="form-group">
            <input type="title" ref="sub_title" class="form-control" id="sub_title" placeholder="Enter sub title" required>
          </div>
         

          <button type="submit" @click.prevent="update" class="btn btn-primary block">
            Submit
          </button>
        </form>
      </div>
</template>

<script>
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
      methods: {
        update() {
            let title = this.$refs.title.value;
            let text = this.$refs.text.value;
            let sub_title = this.$refs.sub_title.value;
          axios
            .put("/api/section/update/" + this.sectionId, { title, text, sub_title })
            .then(response => {
              this.successful = true;
              this.error = false;
              this.errors = [];
              this.$router.push({name:'section', params: { postId: this.id } });
            })
            .catch(error => {
              if (!_.isEmpty(error.response)) {
                if ((error.response.status = 422)) {
                  this.errors = error.response.data.errors;
                  this.successful = false;
                  this.error = true;
                }
              }
            });
        },
        getPost() {
          axios.get("/api/section/" + this.sectionId).then(response => {
            this.$refs.title.value = response.data.section.title;
            this.$refs.text.value = response.data.section.text;
            this.$refs.sub_title.value = response.data.section.sub_title;
          });
        }
      }
    };
</script>

<style>

</style>

 