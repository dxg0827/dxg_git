<template>
  <div class="main">
    <!--面包屑导航-->
    <div class="breadcrumb">
      <div class="container">
        <h2>
          <a href="">首页</a>&gt;<a href="">热门动态</a>
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
      <ul v-for="news in list">
        <li>
        <span>{{news.pubTime|moment}}</span>
        <router-link to="newsdetail">{{news.title}}</router-link>
        </li>
      </ul> 
      
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
      pageSize:6,
      pageNo:1,//记录当前第几页
      pageCount:1,//一共有几页
      pageList:[]//页码列表（数组）
      
    }
  },
  watch:{
        pageSize:function(){
            this.pageNo=1;
            console.log(this.pageSize);
            this.loadProduct();

            },
        pageNo:function(){
          this.loadProduct();
        }
        
      },
  methods:{
    changePage:function(nowPage){
          this.pageNo = nowPage;
          console.log(this.pageNo);
          console.log(this.pageSize);
          this.loadProduct();
    },

  loadProduct:function(){
    this.$http.get('http://localhost/mfly/mfly_data/news/news_select.php?pageSize='+this.pageSize+'&pageNo='+this.pageNo).then(
            (response)=>{
              console.log(response.data);
            this.list = response.data.data;// 保存产品列表
            this.pageCount =  response.data.pageCount;
            this.pageList=[];
            for(var i=0;i<this.pageCount;i++){
                this.pageList.push(i+1)
            }
            })

    }

  },
   created:function(){
        this.loadProduct();
}
}
</script>

<style scoped>
</style>

