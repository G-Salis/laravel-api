<template>
  <article>
    <h3>{{post.title}}</h3>
    <p class="data">{{post.created_id}}</p>
    <p class="text">{{post.content}}</p>
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
        return post.content.substr(0, 50) + '...';
      },
      formatData(){
        const d = new Data(this.post.created_id);
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
    .data{
      font-size: 12px;
      font-style: italic;
    }
    .text{
      padding: 5px 0px;
    }
  }

</style>
