<template>
<div class="container">
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
      methods: {
        create() {
            let title = this.$refs.title.value;
            let text = this.$refs.text.value;
            let sub_title = this.$refs.sub_title.value;
          axios
            .post("/api/page/"+this.postId+"/section", { title, text, sub_title })
            .then(response => {
              this.successful = true;
              this.error = false;
              this.errors = [];
              this.$router.push({name:'section', params: { posId: this.postId } });
            })
            .catch(error => {
              if (!_.isEmpty(error.response)) {
                if ((error.response.status == 422)) {
                  this.errors = error.response.data.errors;
                  this.successful = false;
                  this.error = true;
                }
              }
            });

            this.$refs.title.value = "";
            this.$refs.text.value = "";
            this.$refs.sub_title.value = "";

        }
      }
}
</script>

<style>

</style>