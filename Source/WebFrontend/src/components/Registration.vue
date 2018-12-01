<template>
  <div class="login">
    <div>
      <el-row>
        <el-col :span="16" :push="4">
          <el-card class="box-card">
          	<el-col>
          	  <h2>{{$t('Registration')}}</h2>
          	</el-col>
          	<el-col>
              <el-form ref="loginForm" :model="user" label-width="200px">
                <el-form-item :label="$t('Username')">
                  <el-input type="text" :model="user.username">
                  </el-input>
                </el-form-item>
                <el-form-item :label="$t('Password')">
                  <el-input type="text" :model="user.password">
                  </el-input>
                </el-form-item>
                <el-form-item :label="$t('Language')">
                  <el-select :placeholder="locale" v-model="$i18n.locale">
                    <el-option v-for="(lang,index) in languages" :key="index" :label="lang" :value="lang"></el-option>
                  </el-select>
                </el-form-item>
              </el-form>
            </el-col>
            <el-col class="registration-button">
              <el-button v-on:click="register">{{$t("Registration")}}</el-button>
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
  name: 'Registration',
  data: function(){
    return {
      user: {
        username: null,
        password: null
      },
      languages: Object.keys(this.$i18n.messages),
    }
  },
  methods:{
    register: function(){
      var _this = this;
      this.$http.post("/api/register", this.user).then((response) => {
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
  padding: 40px;
}
h2{
  color: #000;
}
.registration-button{
  margin-bottom: 30px;
}
</style>
