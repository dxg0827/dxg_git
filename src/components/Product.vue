<template>
  <div>
  
  

<div class="breadcrumb">
  <div class="container">
    <h2>
      <router-link to="/prodetail">首页</router-link>&gt;<router-link to="/prodetail">商品浏览</router-link>
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

<div class="main container">
  <div class="pl_header">
    <a href="javascript:" @click="Type1" :class="{cur:type==1}">旋翼无人机</a>
    <a href="javascript:" @click="Type2" :class="{cur:type==2}">固定翼无人机</a>
  </div>

  <ul class="product_list clearfloat" >
     <li v-for="product in list">
       <router-link :to="{ path: 'prodetail', query: { pid:product.pid }}"
        ><img :src="require('../assets/'+product.pic)" alt=""/></router-link>
       <div class="pdlist_text clearfloat">
         <h3>
           <p>{{product.model}}</p>
           <span>{{product.title2}}</span>
         </h3>
         <!--路由传参../prodetail?pid=4-->
         <router-link :to="{ path: 'prodetail', query: { pid:product.pid }}"
        >查看详情</router-link>
       </div>
     </li>
     
  </ul>
  <div class="pages">
     <a v-if="pageNo>1" @click="--pageNo">上一页</a>
     <!--<a class:pages-a v-else>上一页</a>-->
     <a @click="changePage(pno)" :class="{cur:pageNo==pno}" v-for="pno in pageList">{{pno}}</a>
     <a v-if="pageNo<pageCount" @click="++pageNo">下一页</a>
      <!--<a class:pages-a v-else>下一页</a>-->
  </div>
</div>
  
  </div>
</template>

<script>
export default {
  data () {
    return {
      type:this.$route.query.type,
      list:[],
      pageSize:3,
      pageNo:1,//记录当前第几页
      pageCount:1,//一共有几页
      pageList:[],//页码列表（数组）
      kw:this.$route.query.kw
      
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
         },
         type:function(){
            console.log(this.type);
            this.loadProduct();
         }
        
        
      },
  methods:{
    changePage:function(nowPage){
          this.pageNo = nowPage;
          this.loadProduct();
    },
    Type1:function(){
      this.type=1;
    },
    Type2:function(){
      this.type=2;
    },

  loadProduct:function(){

       if(this.kw){
         this.$http.get('http://localhost/mfly/mfly_data/products/product.php?pageSize='+this.pageSize+'&pageNo='+this.pageNo+'&type='+this.type+'&kw='+this.kw).then(
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
       else{
         this.$http.get('http://localhost/mfly/mfly_data/products/product.php?pageSize='+this.pageSize+'&pageNo='+this.pageNo+'&type='+this.type).then(
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
    

    }

  },
   created:function(){
        this.loadProduct();
},
mounted:function(){
}

}
</script>

<style scoped>
</style>
