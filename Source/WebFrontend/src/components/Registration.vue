<template>
  <div class="login">
    <div>
      <el-row>
      	<el-col>
      	  <h2>{{$t('Registration')}}</h2>
      	</el-col>
      	<el-col>
          <el-form ref="loginForm" :model="user" label-width="120px">
            <el-form-item label="Felhasználónév">
              <el-input type="text" :model="user.username">
              </el-input>
            </el-form-item>
            <el-form-item label="Jelszó">
              <el-input type="text" :model="user.password">
              </el-input>
            </el-form-item>
          </el-form>
        </el-col>
      </el-row>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'Registration',
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
