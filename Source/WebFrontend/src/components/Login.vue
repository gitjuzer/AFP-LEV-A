<template>
  <div class="login">
    <div>
      <el-row>
        <el-col :xs={span:24,offset:0} :sm={span:16,offset:4} >
          <el-card class="box-card">
          	<el-col>
          	  <h2>{{$t('Login')}}</h2>
            </el-col>
            <el-col>
              <el-form ref="loginForm" label-width="30%">
                <el-form-item :label="$t('E-mail')">
                  <el-input type="text" v-model="user.email">
                  </el-input>
                </el-form-item>
                <el-form-item :label="$t('Password')">
                  <el-input type="password" v-model="user.password">
                  </el-input>
                </el-form-item>
              </el-form>
              <el-col>
                <el-col class="login-button" :span="12" :push="6">
                  <el-button v-on:click="login">{{$t('Login')}}</el-button>
                </el-col>
                <el-col class="registration-link" :span="21">
                  <a v-on:click="$router.push('registration')">{{$t('If you dont have account, click here to register')}}</a>
                </el-col>
              </el-col>
            </el-col>
          </el-card>
        </el-col>
      </el-row>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'Login',
  data: function(){
    return {
      user: {
        email: null,
        password: null
      },
      languages: Object.keys(this.$i18n.messages),
    }
  },
  methods:{
    login: function(){
      var _this = this;
      this.$http.post("/api/login",this.user).then((response) => {
        localStorage.setItem("token",response.data.payload.token);
       // _this.$globals.loggedIn = true;
        //_this.$globals.user = {realName:_this.user.realName};
        localStorage.setItem("realName", _this.user.email)
        _this.$notify.success(_this.$t('Sikeres bejelentkezés'));
        _this.$root.$emit('refresh-header');
        _this.$router.push("dashboard");
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
.el-card{
  padding: 20px;
}
.registration-link{
  cursor: pointer;
  margin: 30px;
  text-align: center;
}
.login-button > div{
  width: 100%;
}
</style>
