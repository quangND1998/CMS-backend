
      <template>
        <div id="posts">

              
            <div>
                <router-link :to="{ name: 'section_create', params: { postId : postId }  }">
                    <button type="button" class="p-1 mx-3 float-left btn btn-sucess">
                      NEW SECTION
                    </button>
                 </router-link>
            </div>
                    <div class="table-responsive">
                        <table id="user-table" class="table table-striped table-bordered responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>Text</th>
                                    <th>subtitle</th>
                                    <th style="width: 15%">Action</th>
                                
                                </tr>
                            </thead>
                            <tbody >
                              
                                    <tr v-for="section in sections " :key="section.id"   data-entry-id="" class="user_input">
                                            <td></td>
                                            <td>{{section.title}}</td>
                                            <td>{{section.text}}</td>

                                            <td>{{section.sub_title}}</td>
                                         


                                            <td>
                                         
                                              <button class="btn btn-xs btn-danger deleteRecord" id="deleteRecord"  @click="deletePost(section.id)">Delete
                                                    </button>
                                             <router-link :to="{ name: 'section.update', params: { sectionId : section.id ,id:postId} }">
                                                  <button class="btn btn-xs btn-success deleteRecord" id="deleteRecord">Update
                                                    </button>
                                            </router-link>
                                               
                                            </td>


                                        </tr>
                             
                                       

                                 
                          
                        
                            
                          
                            </tbody>
                        </table>
                    </div>
            <!-- <div>
                           <router-link :to="{ name: 'create' }">
                  <button type="button" class="p-1 mx-3 float-left btn btn-sucess">
                    NEW POST
                    </button>
                 </router-link>
            </div> -->
<!-- 
            <div class="border p-3" v-for="post in posts " :key="post.id" >
                {{ post.name }}
                {{post.description}}
                <img v-bind:src="post.image">
                <router-link :to="{ name: 'update', params: { postId : post.id } }">
                    <button type="button" class="p-1 mx-3 float-right btn btn-light">
                        Update
                    </button>
                </router-link>
                  <ul>
            </ul>
                <button
                    type="button"
                    @click="deletePost(post.id)"
                    class="p-1 mx-3 float-right btn btn-danger"
                >
                    Delete
                </button>
            </div> -->
            <!-- <div>
                <button
                    v-if="next"
                    type="button"
                    @click="navigate(next)"
                    class="m-3 btn btn-primary"
                >
                  Next
                </button>
                <button
                    v-if="prev"
                    type="button"
                    @click="navigate(prev)"
                    class="m-3 btn btn-primary"
                >
                  Previous
                </button>
            </div> -->
        </div>

</template>

<script>
export default {
    name:"page-component",
       props: {
        postId: {
          required: true
        }
      },
    
    
        mounted  () {
        this.getPosts();
      },
   
   
 
  
      data() {
        return {
          sections : {},
    
        };
      },

      methods: {


        getPosts(address) {
            var address ='http://127.0.0.1:8000';

            axios.get("/api/page/"+this.postId+'/section').then(response => {
            this.sections  = response.data.data.section;
            console.log(this.sections)
          });
        },
        deletePost(id) {
          axios.delete("/api/section/delete/" +id).then(response => this.getPosts())
        },

      }
    };
</script>

