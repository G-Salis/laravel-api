<template>
  <article>
    <h3>
      <router-link :to="{name: 'detail', params: {slug: post.slug}}">{{post.title}}</router-link>
    </h3>
    <p v-if="post.category">{{post.category.name}}</p>

    <div class="category" v-if="post.tags">
      <span
      class="tags" 
      v-for="(tag, index) in post.tags"
      :key="`tag${index}`">{{tag.name}}</span>
    </div>

    <p class="data">{{formatData}}</p>
    <p class="text">{{troncateTex}}</p>
  </article>
</template>

<script>
  export default{
    name: 'PostItem',
    props:{
      'post':Object
    },
    computed:{
      troncateTex(){
        return this.post.content.substr(0, 50) + '...';
      },
      formatData(){
        const d = new Date(this.post.created_at);
        let day = d.getDate();
        let month = d.getMonth() +1;
        const year = d.getFullYear();

        return `${day}/${month}/${year}`;
      }
    }
  }
</script>

<style lang="scss" scoped>
  article{
    margin-bottom: 15px;
    .category{
      margin: 5px 0px;
      color: lightsalmon;
      .tags{
        padding: 5px;
        margin-right: 5px;
        background-color: lightblue;
}
      }
    }
    .data{
      font-size: 12px;
      font-style: italic;
    }
    .text{
      padding: 5px 0px;
    }
  

</style>
