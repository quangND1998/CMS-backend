
      <template>
        <div id="posts">
             
            <div>
                           <router-link :to="{ name: 'create' }">
                  <button type="button" class="p-1 mx-3 float-left btn btn-sucess">
                    NEW POST
                    </button>
                 </router-link>
            </div>

            <div class="border p-3" v-for="post in posts " :key="post.id" >
              
                <router-link :to="{ name: 'section', params: { postId : post.id } }">
                 
                     {{ post.name }}
       
                </router-link>
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
            </div>
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
                <div>
                      <router-view></router-view>
                 </div>
        </div>

</template>

<script>
export default {
    name:"page-component",
      mounted() {
        this.getPosts();
      },
      data() {
        return {
          posts: {},
    
        };
      },

      methods: {


        getPosts(address) {
            var address ='http://127.0.0.1:8000';
            axios.get(address +"/api/page").then(response => {
            this.posts = response.data.data;
          });
        },
        deletePost(id) {
          axios.delete("/api/page/delete/" +id).then(response => this.getPosts())
        },
      }
    };
</script>

