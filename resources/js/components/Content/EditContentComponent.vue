<template>
 <div class="container">
     <router-link :to="{ name: 'content', params: { sectionId : sectionId, postId:postId }  }">
            <button type="button" class="p-1 mx-3 float-left btn btn-sucess">
              BACK
            </button>
        </router-link>
     <h2>Create Content</h2>
        <form>
          <div :class="['form-group m-1 p-3', (successful ? 'alert-success' : '')]">
            <span v-if="successful" class="label label-sucess">Published!</span>
          </div>
          <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
            <span v-if="errors.subtitle" class="label label-danger">
              {{ errors.subtitle[0] }}
            </span>
            <span v-if="errors.short_content" class="label label-danger">
              {{ errors.short_content[0] }}
            </span>
            <span v-if="errors.image" class="label label-danger">
              {{ errors.image[0] }}
            </span>
            <span v-if="errors.detail" class="label label-danger">
              {{ errors.detail[0] }}
            </span>
            <span v-if="errors.title" class="label label-danger">
              {{ errors.sub_title[0] }}
            </span>
                    <span v-if="errors.icon_image" class="label label-danger">
              {{ errors.icon_image[0] }}
            </span>
                    <span v-if="errors.icon_class" class="label label-danger">
              {{ errors.icon_class[0] }}
            </span>

          </div>

          <div class="form-group">
            <input type="title" ref="title" class="form-control" id="title" placeholder="Enter title" required>
          </div>
            <div class="form-group">
            <input type="title" ref="subtitle" class="form-control" id="subtitle" placeholder="Enter subtitle" required>
          </div>

          <div class="form-group">
            <textarea class="form-control" ref="short_content" id="short_content" placeholder="Enter  short_content" rows="8" required></textarea>
          </div>
          
          <div class="form-group">
            <textarea class="form-control" ref="detail" id="detail" placeholder="Enter  detail" rows="8" required></textarea>
          </div>
            <div class="form-group">
            <input type="title" ref="icon_class" class="form-control" id="icon_class" placeholder="Enter class icon" required>
          </div>
                  <div class="form-group">
            <input type="title" ref="video" class="form-control" id="video" placeholder="Enter video link" required>
          </div>

          <div class="custom-file mb-3">
            <input type="file" ref="image" name="image" class="custom-file-input" id="image" required>
            <label class="custom-file-label" >Choose file...</label>
          </div>
            <div class="custom-file mb-3">
            <input type="file" ref="icon_image" name="icon_image" class="custom-file-input" id="icon_image" required>
            <label class="custom-file-label" >Choose file...</label>
          </div>

          <button type="submit" @click.prevent="create" class="btn btn-primary block">
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
   
          contentId: {
          required: true
        },
        sectionId:{
            required:true
        },postId:{
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
      methods: {
        create() {
          const formData = new FormData();
          formData.append("title", this.$refs.title.value);
          formData.append("subtitle", this.$refs.subtitle.value);
          formData.append("short_content", this.$refs.short_content.value);
          formData.append("detail", this.$refs.detail.value);
            formData.append("icon_class", this.$refs.icon_class.value);
          formData.append("video", this.$refs.video.value);

          formData.append("image", this.$refs.image.files[0]);
            formData.append("icon_image", this.$refs.icon_image.files[0]);

          axios
            .post("/api/item/update/"+this.contentId, formData)
            .then(response => {
              this.successful = true;
              this.error = false;
              this.errors = [];
            this.$router.push({name:'content' });
            //   this.$router.push({name:'content', params:{sectionId: sectionId}});
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

        //   this.$refs.name.value = "";
        //   this.$refs.description.value = "";
        //     this.$refs.name.value = "";
        //   this.$refs.description.value = "";
        // this.$refs.name.value = "";
        //   this.$refs.description.value = "";

        }
        ,
        getPost() {
  
            axios.get("/api/item/" + this.contentId).then(response => {
                console.log(response);
                this.$refs.title.value = response.data.item.title;
                this.$refs.subtitle.value = response.data.item.subtitle;
                this.$refs.short_content.value = response.data.item.short_content;
                this.$refs.detail.value = response.data.item.detail;
                this.$refs.icon_class.value = response.data.item.icon_class;
                this.$refs.video.value = response.data.item.video;
          });
        }
      }

}
</script>

<style>

</style>