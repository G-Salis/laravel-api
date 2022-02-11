<template>
  <header>
    <nav>
      <ul>
        <li><router-link :to="{name: 'home'}">Home</router-link></li>
        <li><router-link :to="{name: 'about'}">About</router-link></li>
        <li><router-link :to="{name: 'blog'}">Blog</router-link></li>
        <li><router-link :to="{name: 'contacts'}">Contacts</router-link></li>
      </ul>
    </nav>
  </header>
</template>

<script>
export default {
  name: "Header"
}
</script>

<style lang="scss" scoped>
  header{
    background-color: darkseagreen;
    text-align: center;
    padding: 20px 0px;
    ul{
      list-style: none;
      li{
        display: inline-block;
        margin: 0px 15px;
      }
      a{
        color: white;
        text-decoration: none;
        &:hover{
          text-decoration: underline;
        }
        &:active{
          color: burlywood;
        }
      }
    }
  }
</style>
