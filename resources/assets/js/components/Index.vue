<template>
	<div class="card">
		<div class="card-header">
			<router-link to ="/create" class="btn btn-primary btn-sm float-right">Create New Post</router-link>
		</div>
		<div class="card-body">
			<table class="table table-bordered">
		    <thead>
		      <tr>
		        <th>Title</th>
		        <th>Description</th>
		        <th>Button</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr v-for="post, index of posts">
		        <td>{{ post.title }}</td>
		        <td>{{ post.description }}</td>
		        <td><router-link :to="{name: 'readPost', params:{id:post.id}}" class="btn btn-info"><i class="fa fa-eye"></i> Show</router-link> <router-link :to="{name: 'editPost', params:{id:post.id}}" class="btn btn-primary">Edit</router-link> <button @click="submitPostDelete(post.id, index)" class="btn btn-danger">Delete</button></td>
		      </tr>
		    </tbody>
		  </table>
		</div>
	</div>
</template>
	<script>
export default {
  data() {
    return {
      posts: [],
      errors: []
    }
  },

  methods:{

  submitPostDelete(id, index) {
    if (confirm("Click 'Ok' to delete.")) {
  
    axios.delete('posts/' + id)
    .then(response => {
      console.log(response)
      // JSON responses are automatically parsed.
      this.posts.splice(index, 1);
    })
    .catch(e => {
      this.errors.push(e)
    })
    }
  }
},  

  // Fetches posts when the component is created.
  created() {
    axios.get('/posts')
    .then(response => {
      // JSON responses are automatically parsed.
      this.posts = response.data
    })
    .catch(e => {
      this.errors.push(e)
    })

  }
}
</script>