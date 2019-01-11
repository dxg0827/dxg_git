<template>
    <div>
        <div class="breadcrumb">
            <div class="container">
                <h2>
                <router-link to="/prodetail">首页</router-link>&gt;<router-link to="/prodetail">目的地</router-link>
                <div class="search clearfloat">
                    <button type="button"></button>
                    <input placeholder="请输入要查询的目的地" type="text"/>
                </div>
                </h2>
            </div>
        </div>
        <div class="main container">
          <ul class="product_list clearfloat" >
                <li v-for="product in list">
                <router-link router-link to="/terminidetail">
                    <img  width="298" height="298" :src="require('../assets/images/termini/'+product.spic)" />
                </router-link>
                <div class="pdlist_text clearfloat">
                    <h3>
                    <p>{{product.sname}}</p>
                    <span>{{product.stitle}}</span>
                    </h3>
                    <!--路由传参../prodetail?pid=4-->
                    <router-link  router-link to="/terminidetail">查看详情</router-link>
                </div>
                </li> 
          </ul>
        <!--
            <ul class="product_list clearfloat" >
                <li> 
                    <a href=""><img src="../assets/images/termini/daocheng.jpeg" width="298" height="298" alt=""/></a> 
                    <div class="pdlist_text clearfloat"> 
                        <h3> 
                        <p>稻城亚丁</p> 
                        <span>牛奶海的邂逅</span> 
                        </h3> 
                        <router-link to="/terminidetail">查看详情</router-link> 
                    </div> 
                </li>
                <li> 
                    <a href=""><img src="../assets/images/termini/jiuzhaigou.jpg" width="298" height="298" alt=""/></a> 
                    <div class="pdlist_text clearfloat"> 
                        <h3> 
                        <p>九寨沟</p> 
                        <span>世界自然遗产、国家重点风景名胜区</span> 
                        </h3> 
                         <router-link to="/terminidetail">查看详情</router-link> 
                    </div> 
                </li>
                <li> 
                    <a href=""><img src="../assets/images/termini/xizang.jpg" width="298" height="298" alt=""/></a> 
                    <div class="pdlist_text clearfloat"> 
                        <h3> 
                        <p>西藏</p> 
                        <span>摄影天堂，不负如来不负卿</span> 
                        </h3> 
                        <a href="">查看详情</a> 
                    </div> 
                </li>
                <li> 
                    <a href=""><img src="../assets/images/termini/qinghai.jpg" width="298" height="298" alt=""/></a> 
                    <div class="pdlist_text clearfloat"> 
                        <h3> 
                        <p>青海</p> 
                        <span>查卡盐湖的圣洁</span> 
                        </h3> 
                        <a href="">查看详情</a> 
                    </div> 
                </li>
                <li> 
                    <a href=""><img src="../assets/images/termini/seda.jpg" width="298" height="298" alt=""/></a> 
                    <div class="pdlist_text clearfloat"> 
                        <h3> 
                        <p>色达</p> 
                        <span>朝圣甘南、佛家圣地</span> 
                        </h3> 
                        <a href="">查看详情</a> 
                    </div> 
                </li>
                <li> 
                    <a href=""><img src="../assets/images/termini/kangding.jpg" width="298" height="298" alt=""/></a> 
                    <div class="pdlist_text clearfloat"> 
                        <h3> 
                        <p>康定</p> 
                        <span>翠林碧野、雨雾缭绕</span> 
                        </h3> 
                        <a href="">查看详情</a> 
                    </div> 
                </li> 
            </ul>
        -->
        </div>
        <!--分页功能-->
        <div class="pages">
            <a v-if="pageNo>1" @click="--pageNo">上一页</a>
            <a @click="changePage(pno)" :class="{cur:pageNo==pno}" v-for="pno in pageList">{{pno}}</a>
            <a v-if="pageNo<pageCount" @click="++pageNo">下一页</a>
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
        pageList:[1,2,3,4,5]//页码列表（数组）
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
        },
        

    },
    mounted:function(){
         this.$http.get('http://localhost/mytrip/trip/data/products/termini.php').then(
            (response)=>{
              console.log(response.data.data);
            this.list = response.data.data;// 保存产品列表
            console.log(this.list[0].spic);
            this.pageCount =  response.data.pageCount;
            this.pageList=[];
            for(var i=0;i<this.pageCount;i++){
                this.pageList.push(i+1)
            }
            })
    },
    
    }
</script>
