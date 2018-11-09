<template>
  <div class="dashboard">
    <div>
      <el-row>
      	<el-col>
      	  <h2>Dashboard</h2>
      	</el-col>
      	<el-col>
          XXX
        </el-col>
      </el-row>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'Dashboard',
  data: function(){
    return {
      user: {
        username: null,
        password: null
      },
    }
  },
  methods:{
    login: function(){
      var _this = this;
      this.axios.post("/login", this.user).then((response) => {
        _this.$notify.success('Sikeres bejelentkezés')
      })
    }

  },
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
h2{
  color: #000;
}
</style>
