<template>
  <div>
    <div class="breadcrumb">
  <div class="container">
    <h2>
      <router-link to="/index">首页</router-link>&gt;<span >产品中心</span>&gt;<span href="">购物车</span>
    </h2>
  </div>
</div>
<div class="main container">
  <div class="cart">
    <div class="cart_header">
      <h1>{{this.$route.query.pid}}</h1>
      <span>已选商品<em>2</em>件</span>
      <span>总金额：<strong>2499.00</strong></span>
      <button type="button">结算</button>
    </div>
    <div class="cart_con">
      <div class="cartcon_title">
        <span><input type="checkbox" v-model="allChecked"/> 全选</span>
        <span>商品信息</span>
        <span>单价</span>
        <span>数量</span>
        <span>金额</span>
        <span>操作</span>
      </div>
      <ul>
        <li v-for="product in list">
          <input type="checkbox" :value="product.title1" v-model="checked" />
          <a href="" class="cart_img">
            <img :src="require('../assets/'+product.pic)" alt=""/>
          </a>
          <a href="" class="cart_title">{{product.title1}}</a>
          <i>¥{{product.price}}</i>
          <div>
            <a href="javascript:void(0)"v-if="product.count>0"  @click="--product.count">-</a>
            <a href="javascript:void(0)"v-else>-</a>
            <input type="text" v-model="product.count"/>
            <a href="javascript:void(0)"@click="++product.count">+</a>
          </div>
          <strong  ref="price">{{Prices=(product.price)*(product.count)}}</strong>
          <em></em>
        </li>
      </ul>
    </div>
    <div class="cart_header">
      <span>已选商品<em>{{list.length}}</em>件</span>
      <span>总金额：<strong>{{totalPrice}}</strong></span>
      <router-link to="/index" @click.native="Pay">结算</router-link>
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
      list:[],
      counts:[],
      checked:[],
      Prices:0,
      checked:0,
    }
  },
  watch:{
    

  },
  methods:{
    Pay:function(){
      if(checked==[]){
        alert('亲，请选择要结算的商品o(∩_∩)o ')
      }
      else{
        alert('您已成功购买商品！')
      }
    }
   
  },
  mounted:function(){
          this.$http.get('http://localhost/project/mfly/mfly_data/cart/cart_detail_select.php?uid=2').then(
            (response)=>{
              console.log(response.data);
            this.list = response.data.products;// 保存产品列表
               console.log(this.list);
              this.id = this.list.pid;
              this.pic = this.list.pic;
              this.counts=this.list.count;
          // console.log(this.$refs.price['0']);
              
              
            })
  },
   computed: {
        totalPrice: function() {
            var total = 0;
            for(var i = 0, len = this.list.length; i < len; i++) {
                total += this.list[i].price * this.list[i].count;
            }
            //每隔三位加一个逗号
            return total.toString().replace(/\B(?=(\d{3})+$)/g, ',');
        },
        allChecked:{
          get:function(){
            return this.checkedCount==this.list.length;
            console.log(this.checkedCount);
            
            },
          set:function(value){
            if(value){
              this.checked= this.list.map(function(product){
                return product.title1
              })
            }
            else{
              this.checked=[]
            }
          },
          checkdCount:{
            get:function(){
              return this.checked.length;
            }
          }
        }
        }
}
</script>

<style scoped>
</style>
