
      <template>
        <div id="posts">
                  
              
            <div>
                <router-link :to="{ name: 'section_create', params: { postId : postId }  }">
                    <button type="button" class="p-1 mx-3 float-left btn btn-sucess">
                      NEW SECTION
                    </button>
                 </router-link>
                  <router-link :to="{ name: 'page' }">
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
                                    <th>Text</th>
                                    <th>subtitle</th>
                                    <th style="width: 15%">Action</th>
                                
                                </tr>
                            </thead>
                            <tbody >
                              
                                    <tr v-for="section in sections " :key="section.id"   data-entry-id="" class="user_input">
                                            <td></td>
                         
                                              <td>                  
                                               <router-link :to="{ name: 'content', params: { sectionId : section.id ,postId:postId} }">
                                                 {{section.title}}
                                                          </router-link></td>
                
                                      
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

        </div>

</template>

<script>
import {mapGetters} from 'vuex';
import store        from '../store/store';
import {FETCH_SECTION,SECTION_DELETE} from '../store/actions/section'
import {PAGE_RESET_STATE} from '../store/actions/page'
export default {
    name:"page-component",
       props: {
        postId: {
          required: true
        }
      },

        created  () {
        this.getPosts();
        //    Echo.private("page").listen("PageSent", e => {
        //     this.sections.push({
        //       title: e.title.body,
        //       text: e.text.body,
        //       sub_title: e.sub_title.body,
        //     });
        // });
      },
         computed: {
          ...mapGetters(["sections","section"])
       },
    async beforeRouteLeave(to, from, next) {
        await store.dispatch(PAGE_RESET_STATE);
        next();
      },

 
  
      data() {
        return {
        
    
        };
      },

      methods: {


        getPosts() {
          this.$store.dispatch(FETCH_SECTION,this.postId);
         

        
        },
        deletePost(id) {
            this.$store.dispatch(SECTION_DELETE,id);
            this.getPosts();
        },

      }
    };
</script>

