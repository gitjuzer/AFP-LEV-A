<template>
  <div class="curricula">
    <div>
      <el-row class="curricula-section">
        <el-col class="curriculum-title">
          <h3>{{curriculum.title}}</h3>
        </el-col>
        <el-col class="curriculum-content">
          <p>{{curriculum.content}}</p>
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
      newTopicDialog:{
        visible: false,
      },
      curriculum: {},
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
    loadCurricula: function(id){
      var _this = this;
      this.$http.get("/sapi/curriculum/"+id).then((response) => {
        console.log("curriculum:",response.data.payload);
        _this.curriculum = response.data.payload;
      })
    },
    handleNodeClick: function(){}

  },
  mounted(){
    this.loadCurricula(this.$route.params.id);
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
.curricula-section{
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
.curriculum-title{
  text-align: center;
}
.curriculim-content{
  padding-left: 5vw;
  padding-right: 5vw;
}
</style>
