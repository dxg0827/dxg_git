<template>
<div>
 <div class="breadcrumb">
    <div class="container">
      <h2>
        <router-link to="/index">首页</router-link>&gt;<router-link to="">目的地</router-link>&gt;<router-link to="">目的地详情</router-link>
      </h2>
    </div>
 </div>
 <div class="main container">
  <div class="pd_info clearfloat">
    <div class="pdinfo_img">
      <img src="../assets/images/termini/jiuzhaigou.jpg" width="400px"htight="400" alt=""/>
    </div>
    <div class="pdinfo_text">
      <h2></h2>
      <ul>
        <li>景点名称：<span>九寨沟黄龙景区</span></li>
        <li><span>出行日期 &nbsp;&nbsp;&nbsp;</span><input type="date" name="traveldate"></li>

        <li>成人(16岁以上)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>168</span>元
         
            <a href="javascript:void(0)"v-if="this.count>0"  @click="--this.count">-</a>
            <a href="javascript:void(0)"v-else>-</a>
            <input type="text" v-model="this.count"/>
            <a href="javascript:void(0)"@click="++this.count">+</a>
        </li>
         <li>儿童(5-12岁)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>98</span>元
         
            <a href="javascript:void(0)"v-if="this.count>0"  @click="--this.count">-</a>
            <a href="javascript:void(0)"v-else>-</a>
            <input type="text" v-model="this.count"/>
            <a href="javascript:void(0)"@click="++this.count">+</a>
        </li>
        <li>婴儿(0-4岁)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>0</span>元
         
            <a href="javascript:void(0)"v-if="this.count>0"  @click="--this.count">-</a>
            <a href="javascript:void(0)"v-else>-</a>
            <input type="text" v-model="this.count"/>
            <a href="javascript:void(0)"@click="++this.count">+</a>
        </li>
      </ul>
      <!--<p>价格：<span>¥</span><strong id="price"></strong></p>-->
      <a @click="toCart" href="javascript:void(0)"><span class="icon_cart"></span>加入购物车</a>
    </div>
  </div>
  <div class="details_box">
    <h2 class="title">用户评价</h2>
    <div class='msgCon'>
      <div>
        <dl>
          <dt>
            <img src='../assets/images/tx.jpg' width='50' height='50'/>
          </dt>
          <dd>神马都是浮云</dd>
        </dl>
        <div class='msgTxt'>xcxzcxzczxcxccxzzcxcxzczx</div>
      </div>
         <div>
        <dl>
          <dt>
            <img src='../assets/images/tx.jpg' width='50' height='50'/>
          </dt>
          <dd>神马都是浮云</dd>
        </dl>
        <div class='msgTxt'>xcxzcxzczxcxccxzzcxcxzczx</div>
      </div>
         <div>
        <dl>
          <dt>
            <img src='../assets/images/tx.jpg' width='50' height='50'/>
          </dt>
          <dd>神马都是浮云</dd>
        </dl>
        <div class='msgTxt'>xcxzcxzczxcxccxzzcxcxzczx</div>
      </div>
    </div>


  </div>
 </div>
</div>    
</template>

<script>
  export default{
    data(){
      return{
        count:1
      }
    },
    methods:{
      toCart:function(){
         var r=confirm("是否去购物车查看已购商品");
                    if (r==true){
                       
                       this.$router.push({path:"/cart"});
                    }
                    else{  
                      this.$router.go(0)
                    }
      }
    }
  }
</script>