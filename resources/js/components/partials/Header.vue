<template>
  <header>
    <nav>
      <ul>
        <li><a href="">Home</a></li>
        <li><a class="active" href="">Blog</a></li>
        <li><a href="">Chi Siamo</a></li>
        <li><a href="">Contatti</a></li>
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
