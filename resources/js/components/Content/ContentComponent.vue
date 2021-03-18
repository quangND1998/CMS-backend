
      <template>
        <div id="posts">
     
              
            <div>
                <router-link :to="{ name: 'content_create', params: { sectionId : sectionId, postId:postId }  }">
                    <button type="button" class="p-1 mx-3 float-left btn btn-sucess">
                      NEW CONTENT
                    </button>
                 </router-link>
                   <router-link :to="{ name: 'section', params: { postId : postId } }">
                 
                  <button type="button" class="p-1 mx-3 float-left btn btn-sucess">
                    BACK
                    </button>
       
                </router-link>
            </div>
                    <div class="table-responsive">
                        <table id="user-table" class="table table-striped table-bordered responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>Subtile</th>
                                    <th>Short content</th>
                                    <th>Detail</th>
                                    <th>String icon</th>
                                    <th>Video</th>
                                    <th>Image</th>
                                    <th>Image Icon</th>
                                    <th style="width: 15%">Action</th>
                                
                                </tr>
                            </thead>
                            <tbody >
                              
                                    <tr v-for="content in contents " :key="content.id"   data-entry-id="" class="user_input">
                                            <td></td>
                                            <td>{{content.title}}</td>
                                            <td>{{content.subtitle}}</td>
                                            <td>{{content.short_content}}</td>
                                            <td>{{content.detail}}</td>
                                            <td>{{content.icon_class}}</td>
                                            <td><iframe width="560" height="315"  :src="content.video" title="description" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                                            <td><img  class="" :src="content.image"></td>
                                            <td><img class="" :src="content.icon_image"></td>   

                                            <td>
                                         
                                              <button class="btn btn-xs btn-danger deleteRecord" id="deleteRecord"  @click="deletePost(content.id)">Delete
                                                    </button>
                                             <router-link :to="{ name: 'content.update', params: { contentId : content.id ,sectionId:sectionId ,postId:postId} }">
                                                  <button class="btn btn-xs btn-success deleteRecord" id="deleteRecord">Update
                                                    </button>
                                            </router-link>
                                               
                                            </td>


                                        </tr>
                            </tbody>
                        </table>
                    </div>
           
        </div>

</template>

<script>
export default {
    name:"page-component",
       props: {
        sectionId: {
          required: true
        },
         postId: {
          required: true
        }
      },
    
    
        mounted  () {
        this.getPosts();
      },
   
   
 
  
      data() {
        return {
          contents : {},
    
        };
      },

      methods: {


        getPosts(address) {
            var address ='http://127.0.0.1:8000';

            axios.get("/api/section/"+this.sectionId+'/items').then(response => {
            this.contents  = response.data.data;


          });
        },
        deletePost(id) {
          axios.delete("/api/item/delete/" +id).then(response => this.getPosts())
        },

      }
    };
</script>

