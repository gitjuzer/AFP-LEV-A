<template>
  <div class="dashboard">
    <div>
      <el-row class="dashboard-section">
        <el-col :span="10" class="left-side">
          <el-tree :data="dataAll" :props="defaultProps" @node-click="handleNodeClick"></el-tree>
        </el-col>
        <el-col :span="14" class="right-side">
          dataview
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
      dataAll: 
        [{
          label: 'Nyelvtan',
          children: [{
            label: 'Level two 1-1',
            children: [{
              label: 'Level three 1-1-1'
            }]
          }]
        }, {
          label: 'Programozás',
          children: [{
            label: 'Level two 2-1',
            children: [{
              label: 'Level three 2-1-1'
            }]
          }, {
            label: 'Level two 2-2',
            children: [{
              label: 'Level three 2-2-1'
            }]
          }]
        }, {
          label: 'Matematika',
          children: [{
            label: 'Level two 3-1',
            children: [{
              label: 'Level three 3-1-1'
            }]
          }, {
            label: 'Level two 3-2',
            children: [{
              label: 'Level three 3-2-1'
            }]
          }]
        }],
      defaultProps: {
        children: 'children',
        label: 'name'
      }
    }
  },
  methods:{
    getList: function(){
      var _this = this;
      this.$http("/sapi/topics", this.user).then((response) => {
        console.log(response.data);
        _this.dataAll = response.data.payload;
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
</style>
