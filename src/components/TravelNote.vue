<template>
  <div class="main">
    <!--面包屑导航-->
    <div class="breadcrumb">
      <div class="container">
        <h2>
          <a href="">首页</a>&gt;<a href="">攻略游记</a>
        </h2>
      </div>
    </div>


     <select v-model="pageSize" class="form-control" id="page-size">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
     </select>
    <!--页面主体-->
    <div class="main container news_container">
      <div class="news">
      <ul v-for="gnote in list">
        <li>
          <span>{{gnote.gtime}}</span>
          <router-link :to="{ path: 'travels', query: { gid:gnote.gid }}">
            {{gnote.gtitle}}
          </router-link>
        </li>
      </ul> 

      <!--
        <ul @click.native="toTrevels">
          <li><span>2016-02-21</span><router-link to="travels">杭州那些私藏江南韵味的地方怎么拍，你才好看？</router-link></li>
          <li><span>2016-02-21</span><router-link to="travels">初次见面请多关照~泰国旅行扫盲指南</router-link></li>
          <li><span>2016-02-21</span><router-link to="travels">金色青海，五彩甘南</router-link></li>
          <li><span>2016-02-21</span><router-link to="travels">台湾环岛交通篇，这有你想要的所有自由行秘籍
</router-link></li>
          <!--<li>
          <span>{{news.pubTime|moment}}</span>
          <router-link to="newsdetail">{{news.title}}</router-link>
          </li>
        </ul>-->
      </div> 
    
      <!-- 分页导航-->
      <div class="pages">
        <a v-if="pageNo>1" @click="--pageNo">上一页</a>
        <a @click="changePage(pno)" :class="{cur:pageNo==pno}" v-for="pno in pageList">{{pno}}</a>
        <a v-if="pageNo<pageCount" @click="++pageNo">下一页</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      list:[],
      pageSize:1,
      pageNo:1,//记录当前第几页
      pageCount:5,//一共有几页
      pageList:[1,2,3,4,5],//页码列表（数组）
      gid:null
    }
  },
  methods:{
    changePage:function(nowPage){
          this.pageNo = nowPage;
          console.log(this.pageNo);
          console.log(this.pageSize);
    },
    toTrevels:function(){
      this.$router.push({path:'travels'});
    }

  },
  mounted:function(){
         this.$http.get('http://localhost/mytrip/trip/data/products/travelnote.php').then(
            (response)=>{
              console.log(response.data.data);
            this.list = response.data.data;// 保存产品列表
            console.log(this.list[0].gpic);
            console.log(this.gid);
            this.pageCount =  response.data.pageCount;
            this.pageList=[];
            for(var i=0;i<this.pageCount;i++){
                this.pageList.push(i+1)
            }
            })
    },
  
}
</script>

<style scoped>
</style>

