<template>
  <div class="dashboard">
    <div>
      <el-row class="dashboard-section">
        <el-col :span="6" class="left-side">
          <el-col v-for="topic in list.topics" :key="topic.id" class="topic-item">
              <el-button v-on:click="loadTopicData(topic.id)" plain>{{topic.name!=null?topic.name:topic.id}}</el-button>
          </el-col>
        </el-col>
        <el-col :span="18" class="right-side">
          <h3>{{$t('List')}}</h3>
          <el-col class="curricula">
            <el-col v-for="cur in list.curricula" :key="cur.id">
              <router-link :to="{ name: 'curricula', params: {id:cur.id}  }">{{cur.title}}</router-link>
            </el-col>
          </el-col>
        </el-col>
      </el-row>
    </div>

  <el-dialog
    :title="$t('New topic')"
    :visible.sync="newTopicDialog.visible"
    width="30%"
    :before-close="closeTaskDialog">
    <el-form-item :label="$t('Login name')">
      <el-input type="text" v-model="user.loginName">
      </el-input>
    </el-form-item>
    <span slot="footer" class="dialog-footer">
      <el-button @click="dialogVisible = false">{{$t('Cancel')}}</el-button>
      <el-button type="primary" @click="dialogVisible = false">{{$t('Save')}}</el-button>
    </span>
  </el-dialog>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'Dashboard',
  data: function(){
    return {
      newTopicDialog:{
        visible: false,
      },
      user: {
        username: null,
        password: null
      },
      list: {
        topics: {},
        curricula: {}
      },
      defaultProps: {
        children: 'children',
        label: 'name'
      }
    }
  },
  methods:{
    closeTaskDialog: function(){
      this.visible = false;
    },
    getList: function(){
      var _this = this;
      this.$http.get("/sapi/topics", this.user).then((response) => {
        console.log("topics:",response.data.payload );
        _this.list.topics = response.data.payload;
      })
    },
    loadTopicData: function(id){
      var _this = this;
      this.$http.get("/sapi/curricula?topic="+id).then((response) => {
        console.log("curricula:",response.data.payload);
        _this.list.curricula = response.data.payload;
      })
    },
    handleNodeClick: function(){}

  },
  mounted(){
    this.getList();
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
.dashboard-section{
  min-height: 90vh;
}
.left-side{
  padding-top: 50px;
}
.topic-item{
  text-align: left; 
  padding: 5px;
}
.topic-item > a{
  text-decoration: none;
}
.curricula{
  text-align: left;
}
.curricula a{
  text-decoration: none;
  margin: 10px;
}
</style>
