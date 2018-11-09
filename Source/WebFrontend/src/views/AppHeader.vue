<template>
  <div class="appheader">
    <el-menu :default-active="activeIndex" class="el-menu-left" mode="horizontal" :router="true">
      <el-menu-item index="dashboard" route="/dashboard"><font-awesome-icon icon="tasks" class="fa-icon"/><span>{{ $t('Dashboard') }}</span></el-menu-item>
      <el-submenu index="6" class="el-menu-right">
        <template slot="title">
          <font-awesome-icon icon="user" class="fa-icon"/><span>{{$globals.user.username}}</span>
        </template>
        <el-menu-item index="settings" route="/settings">{{ $t('Settings') }}</el-menu-item>
        <el-menu-item index="import-status" route="/import-status">{{ $t('Import status') }}</el-menu-item>
<!--         <el-menu-item index="6-2" route="/registration">{{ $t('Registration') }}</el-menu-item> -->
        <el-menu-item index="logout" route="/logout">{{ $t('Logout') }}</el-menu-item>
      </el-submenu>
      <el-menu-item index="admin-page" route="/admin-page" v-if="$globals.user.role == 'ROLE_ADMIN'" class="el-menu-right" :title='$t("Admin page")'><font-awesome-icon icon="cog" class="fa-cog-icon" /></el-menu-item>
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
    }
  },
  methods:{
  },
  mounted(){
    this.$nextTick(() => {
      this.activeIndex = this.$router.history.current.name.toLowerCase();
    })
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.fa-icon{
  margin-right: 5px;
}
</style>
