<template>
  <div class="login">
    <div>
      <el-row>
        <el-col :span="12" :push="6">
          <el-card class="box-card">
          	<el-col>
          	  <h2>{{$t('Login')}}</h2>
            </el-col>
            <el-col>
              <el-form ref="loginForm" :model="user" label-width="30%">
                <el-form-item :label="$t('Username')">
                  <el-input type="text" :model="user.username">
                  </el-input>
                </el-form-item>
                <el-form-item :label="$t('Password')">
                  <el-input type="text" :model="user.password">
                  </el-input>
                </el-form-item>
                <el-form-item :label="$t('Select language')">
                  <el-select :placeholder="locale" v-model="$i18n.locale">
                    <el-option v-for="(lang,index) in languages" :key="index" :label="lang" :value="lang"></el-option>
                  </el-select>
                </el-form-item>
              </el-form>
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
        username: null,
        password: null
      },
      languages: Object.keys(this.$i18n.messages),
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
