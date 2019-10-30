<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default" style="color:black;">
                    <div class="card-header">Create New Post</div>

                    <div class="card-body">
                        <form v-on:submit="submitPost()">
                            <div class="form-group">
                                <input type="text" v-model="posts.title" placeholder="Title" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea v-model="posts.description" id="" placeholder="Description..." class="form-control" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <router-link to="/" class="btn btn-info">Cancel</router-link>
                                <button class="btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
  data:function() {
    return {
      posts: {
        title:'',
        description:'',
      },
      errors: []
    }
  },

  // Fetches posts when the component is created.
methods:{

  submitPost() {
    axios.post('posts', this.posts)
    .then(response => {
      // JSON responses are automatically parsed.
      console.log(response)
      this.$router.push({path:'/'})
      this.posts = response.data
    })
    .catch(e => {
      this.errors.push(e)
    })
  }
}  
}
</script>