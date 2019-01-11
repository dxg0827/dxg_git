<template>
<div>
  <div class="breadcrumb">
  <div class="container">
    <h2>
      <a href="">首页</a>&gt;<a href="">产品中心</a>
    </h2>
  </div>
</div>
<!--页面主体-->
<div class="main container">
  <div class="cart">
    <div class="cart_con">
      <div class="cartcon_title">
        <span><input type="checkbox"/> 全选</span>
        <span>商品信息</span>
        <span>金额</span>
        <span>操作</span>
      </div>
      <ul>
        <li>
          <input type="checkbox" class="cart_checkbox"/>
          <a href="" class="cart_img"><img src="../assets/images/termini/daocheng.jpeg" alt=""/></a>
          <a href="" class="cart_title">家用除甲醛静音M-8088A</a>
          <i>¥1599</i>
          <em></em>
        </li>
        <li>
          <input type="checkbox" class="cart_checkbox"/>
          <a href="" class="cart_img"><img src="product-imgs/jhq-m8088a.jpg" alt=""/></a>
          <a href="" class="cart_title">家用除甲醛静音M-8088A</a>
          <i>¥1599</i>
          <em class="cart_em"></em>
        </li>
      </ul>
    </div>
    <div class="cart_header">
      <span>已选商品<em>2</em>件</span>
      <span>总金额：<strong>2499.00</strong></span>
      <button type="button">结算</button>
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
      checkItem:[],
      checked:[],
      Prices:0,
      uid:sessionStorage.uid
    }
  },
  watch:{
  },
  methods:{
    selectAll:function(){

      if(this.checkItem.length>0){
        this.checkItem=[]
      }
      else{
        for(var i=0;i<this.list.length;i++){
          this.checkItem.push(this.list[i])
        }
      }
    },
    deleteAll:function(){
      for(var i=0;i<this.checkItem.length;i++){
        let index = this.list.indexOf(this.checkItem[i])
        if(index>=0){
          this.list.splice(index,1)
        }
      }
    },
     Pay:function(){
      if(this.checkItem.length<1){
        alert('亲，请选择要结算的商品o(∩_∩)o ')
      }
      else if(this.checkItem.length==this.list.length){
        for(var i=0;i<this.checkItem.length;i++){
        let index = this.list.indexOf(this.checkItem[i])
        if(index>=0){
          this.list.splice(index,1)
        }
      }
        alert('您已清空购物车！')
      }
      else{
        for(var i=0;i<this.checkItem.length;i++){
        let index = this.list.indexOf(this.checkItem[i])
        if(index>=0){
          this.list.splice(index,1)
        }
      }
        alert('您已成功购买商品！')
      }
    },
    BackToProduct:function(){
      
    }
  },
  mounted:function(){
          this.$http.get('http://localhost/mfly/mfly_data/cart/cart_detail_select.php?uid='+this.uid).then(
            (response)=>{
              console.log(response.data);
            this.list = response.data.products;// 保存产品列表
               console.log(this.list);
              this.id = this.list.pid;
              this.pic = this.list.pic;
            })
  },
   computed:{
          totalNum:function(){
            return 8
          },
          totalPrice:function(){
            let price=0;
            this.checkItem.forEach(function(item){
              price+=Number(item.price*item.count)
            })
            return price
          }
        }
}
</script>

<style scoped>
</style>
