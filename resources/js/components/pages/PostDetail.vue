<template>
  <main class="container">
    <h1>{{post.title}}</h1>
    <h3 class="category" v-if="post.category">{{post.category.name}}</h3>
    <div>
      <span class="tags"
      v-for="(tag, index) in post.tags"
      :key="`tag${index}`">{{tag.name}}</span>
    </div>
    <p>{{post.content}}</p>
  </main>
</template>

<script>
export default {
  name: 'PostDetail',
  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/posts/',
      post:{
        title:'',
        content:'',
        category:{},
        tags:[]
      }
    }
  },
  methods:{
    getApi(){
      axios.get(this.apiUrl + this.$route.params.slug)
      .then(res=>{
        this.post = res.data;
        console.log(this.post);
      }
      )
    }
  },
  mounted(){
    console.log(this.$route.params.slug);
    this.getApi();

  }
}
</script>

<style lang="scss" scoped>

main{
  margin: 30px 0px;
  .category{
      margin: 5px 0px;
      color: lightsalmon;
      }
  .tags{
    padding: 5px;
    margin-right: 5px;
    background-color: lightblue;
  }

}

</style>