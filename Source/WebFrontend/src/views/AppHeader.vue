<template>
  <div class="appheader">
    <el-menu :default-active="activeIndex" class="el-menu-left" mode="horizontal" :router="true">
      <el-menu-item index="0" route="/"><img src="@/assets/books_open.jpg" class="logo" alt="Project X logo"><span class="logo_title">Project X</span></el-menu-item>
      <el-menu-item index="dashboard" route="/dashboard"><font-awesome-icon icon="tasks" class="fa-icon"/><span>{{ $t('Dashboard') }}</span></el-menu-item>
      <el-menu-item index="new-topic" route="/new-topic"><font-awesome-icon icon="plus" class="fa-icon"/><span>{{ $t('New topic') }}</span></el-menu-item>
      <el-menu-item class="el-menu-right">
        <el-select class="languages" :placeholder="locale" v-model="$i18n.locale">
          <el-option v-for="(lang,index) in languages" :key="index" :label="lang" :value="lang"></el-option>
        </el-select>
      </el-menu-item>
      <el-submenu index="6" class="el-menu-right">
        <template slot="title">
          <font-awesome-icon icon="user" class="fa-icon"/><span>{{realName}}</span>
        </template>
        <el-menu-item index="logout" route="/logout">{{ $t('Logout') }}</el-menu-item>
      </el-submenu>
    </el-menu>
  </div>
</template>

<script>
//import {globalStore} from '../main.js'
export default {
  name: 'appheader',
  data: function(){
    return {
      activeIndex: "0",
      realName: localStorage.getItem("realName"),
      languages: Object.keys(this.$i18n.messages),
    }
  },
  methods:{
  },
  mounted(){
    var _this = this;
    this.$nextTick(() => {
      this.activeIndex = this.$router.history.current.name.toLowerCase();
      this.realName = localStorage.getItem("realName");
    })
    _this.$root.$on('refresh-header', (data)=>{
      _this.realName = localStorage.getItem("realName");
    })
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.fa-icon{
  margin-right: 5px;
}
.el-menu-right{
  float: right;
}
.logo{
  width: 50px;
  margin-right: 20px;
}
.logo_title{
  font-weight: bold;
  font-size: 24px;
  color: #004890;
}
.languages{
  width: 80px;
}
</style>
