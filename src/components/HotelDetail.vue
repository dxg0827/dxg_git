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
      <img src="../assets/images/termini/seda.jpg" width="400px"htight="400" alt=""/>
    </div>
    <div class="pdinfo_text">
      <h2></h2>
      <ul>
        <li>酒店名称：<span>亚丁酒店</span></li>
        <li><span>出行日期 &nbsp;&nbsp;&nbsp;</span><input type="date" name="traveldate"></li>

        <li>房间类型&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>单间</span>
        </li>
        
        <li>价格&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>189</span>元
        </li>
      </ul>
      <!--<p>价格：<span>¥</span><strong id="price"></strong></p>-->
      <router-link to="" @click.native="HotelOrder" id="addCart"><span class="icon_cart"></span>立即预订</router-link>
    </div>
  </div>
  <div class="details_box">
    <h2 class="title">用户评价</h2>
    <div class="pd_details">

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
        HotelOrder:function(){
                alert("下单成功！");
        }
    }
  }
</script>