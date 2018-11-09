<template>
  <div id="app" :class="this.$i18n.locale">
    <el-container
      v-loading.fullscreen.lock="loading2"
      element-loading-background="rgba(0, 0, 0, 0.9)">
      <el-header  v-if="loggedIn">
        <AppHeader/>
      </el-header>
      <el-main>
        <router-view class="main-page"></router-view>
      </el-main>
      <el-footer>
        <AppFooter/>
      </el-footer>
    </el-container>
  </div>
</template>

<script>
import AppHeader from '@/views/AppHeader'
import AppFooter from '@/views/AppFooter'

export default {
  name: 'app',
  components: {
    AppHeader,AppFooter
  },
  data(){
    return {
      loading2: true,
      loggedIn: true,
    }
  },
  mounted(){
    var _this = this;
    setTimeout(function(){
      _this.loading2 = false
    },1000)
  }

}
</script>

<style>
body{
  margin:0px;
  padding: 0px;
  background-image: url('/img/bg.jpg');
  background-size: 100% auto;
  background-repeat: repeat, no-repeat;
}
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  min-height: 300px;
}
.app-content{
  margin-top: 50px;
}
.app-header{
  border-bottom: 1px solid;
  position: fixed;
  background: white;
  z-index: 10;
}
.app-footer{
  height: 10px;
  background: white;
  z-index: 100;
  position: fixed;
  bottom: 0;
}
@media print { body { background: none; } }
</style>
