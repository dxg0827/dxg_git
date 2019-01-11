<template>
  <div>
  <div class="breadcrumb">
    <div class="container">
      <h2>
        <router-link to="">首页</router-link>&gt;<router-link to="">产品中心</router-link>&gt;<router-link to="">净美仕净化器</router-link>
      </h2>
    </div>
  </div>
<div class="main container">
  <div class="pd_info clearfloat">
    <div class="pdinfo_img">
      <img :src="require('../assets/'+pic)" alt=""/>
    </div>
    <div class="pdinfo_text">
      <h2></h2>
      <ul>
        <li>产品编号：{{list.pid }}</li>  
        <li>功能：{{list.func}}</li>
        <li>噪音：{{list.noise}}</li>
        <li>风量：{{list.wind}}</li>
        <li>适用对象：{{list.applyTo}}</li>
        <li>产品规格：{{list.size}}</li>
        <li>空气净化能效等级：{{list.level}}</li>
      </ul>
      <p style="font-size:18px;">价格：<span>¥</span><strong id="price">{{list.price}}</strong></p>
      <router-link @click.native="addCart" id="addCart"
      :to="{ path: 'cart', query: { pid:id }}">
          <span class="icon_cart"></span>加入购物车
      </router-link>
    </div>
  </div>
  <div class="details_box">
    <h2 class="title">产品详情</h2>
    <div class="pd_details">
      <p>{{list.detail}}</p> 
      <img src="../assets/images/pro_detail/canshu1.jpg" alt=""/>
      <img src="../assets/images/pro_detail/canshu2.jpg" alt=""/>
      <img src="../assets/images/pro_detail/canshu3.jpg" alt=""/>
      <img src="../assets/images/pro_detail/canshu4.jpg" alt=""/>
    </div>
  </div>
</div>
</div>
</template>

<script>

  
export default {
  data () {
    return {
      pid:this.$route.query.pid,
      list:{},
      uid:sessionStorage.uid,
      pic:'',

    }
  },
  watch:{
    idChange:function(){
        console.log(this.id);
    }

  },
  methods:{
    loadProduct:function(){
        this.$http.get
        ('http://localhost/mfly/mfly_data/products/product_detail.php?uid=1&pid='+this.pid).then(
            (response)=>{
              console.log(response.data);
            this.list = response.data;// 保存产品列表
              console.log(this.list);
            })

    },
    addCart:function(){
      this.$http.get('http://localhost/mfly/mfly_data/cart/cart_detail_add.php?uid='+this.uid+'&pid='+this.pid).then(
            (response)=>{
              console.log(response);
            this.list = response.data;// 保存产品列表
              console.log(this.list);
              this.id = this.list.pid;
              this.pic = this.list.pic;
              
            });
      
    }
  },
  mounted:function(){
          this.$http.get('http://localhost/mfly/mfly_data/products/product_detail.php?pid='+this.pid).then(
            (response)=>{
              console.log(response.data);
            this.list = response.data;// 保存产品列表
              console.log(this.list);
              this.id = this.list.pid;
              this.pic = this.list.pic;
              
            })
    
  }
}
</script>
<style scoped>
</style>
