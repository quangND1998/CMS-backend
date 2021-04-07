
      <template>
        <div id="posts">

        <div  v-if="msg" :class="['form-group m-1 p-3', msg ? 'alert alert-success alert-dismissible fade show' : '']" role="alert">
          <strong>Congratulations !!!</strong> {{msg}}.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div>
                  <router-link :to="{ name: 'create' }">
                  <button type="button" class="p-1 mx-3 float-left btn btn-sucess">
                    NEW POST
                    </button>
                 </router-link>
            </div> 
            <div class="border p-3" v-for="post in posts " :key="post.id" >
              
                <router-link :to="{ name: 'section', params: { postId : post.id } }">
                 {{post.name}}
              
       
                </router-link>
                {{post.description}}
                <img v-bind:src="post.image">
                <router-link :to="{ name: 'update', params: { postId : post.id }  }">
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
            </div>
            </div>

</template>

<script>
import { mapGetters } from "vuex";
import store        from '../store/store';
import { FETCH_PAGES, PAGE_DELETE,PAGE_RESET_STATE } from '../store/actions/page';

export default {
  
    name:"page-component",
        components: { },
        created() {
            this.fetchPages();
       

      },
      props:{
        msg:{
          
        }
      }
      ,

 
      computed: {
          ...mapGetters(["posts","page","isAuthenticated"])
       },
      data() {
        return {
      
    


       
         
       
    
        };
      },
       beforeRouteLeave(to, from, next) {
         store.dispatch(PAGE_RESET_STATE);
        next();
      },
 
      methods: {
    fetchPages() {
         this.$store.dispatch(FETCH_PAGES);

        },
        // getPosts(address) {
        //     var address ='http://127.0.0.1:8000';
        //     axios.get(address +"/api/page").then(response => {
        //     this.posts = response.data.data;
        //   });
        // },
         deletePost(id) {
     
              this.$store.dispatch(PAGE_DELETE,id)
              this.fetchPages()
        },
      }
    };
</script>

