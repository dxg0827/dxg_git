<template>
  <div>
    <header class="header container">
      <h1 class="logo"><a href="index.html" class="link"></a></h1>
      <div class="h_con">
        <ul class="clearfloat">
          <li class="phone">189-6666-8888</li>
          <li><em>|</em></li>
          <li v-if=(!uname)><router-link to="/login" class="h_login">登录</router-link></li>
          <li><em>|</em></li>
          <li v-if=(!uname)><router-link to="/register" class="h_register">注册</router-link></li>
          <li v-if=(uname) class="top_user"><span>欢迎你，</span><a @click="toPerson" href="javascript:">{{this.uname}}</a></li>
          <li v-if=(uname) class="top_quit"><router-link to="/login" @click.native="signOut">退出</router-link></li>
        </ul>
        
      </div>
    </header>
    <!--nav-->
    <nav class="navbar">
      <div class="container">
        <div class="nav">
          <ul>
            <li><router-link to="/index" ><span class="icon_home"></span>首页</router-link></li>
            <li><router-link to="/termini" >目的地</router-link></li>
            <li class="nav_pd">
              <router-link :to="{ path: 'travelmall'}">旅行商城</router-link>
            </li>
            <li>
              <router-link to="/hotel">酒店预订</router-link>
            </li>
            <li><router-link to="/travelnote" >旅游攻略</router-link></li>
            <li>
              <router-link to="/about">关于我们</router-link>
            </li>
          </ul>
        </div>
        <div class="s_cart">
          <!--<router-link :to="{path:'/cart',query:{uid:this.uid}}" v-if="this.uid">
            <span class="icon_cart"></span>购物车<span class="icon_sj"></span>
          </router-link>-->
          <div class="cart_dropdown">
            
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  data () {
    return {
      uname:sessionStorage.uname,
      uid:sessionStorage.uid,
      kw:'',
      type:1
    }
  },
  watch:{  
  },
  methods:{
    
    Type1:function(){
          this.type=1;
          this.$router.push({path:'product', query: { type:this.type}});
          history.go(0);
    }, 
    Type2:function(){
        this.type=2;
        this.$router.push({path:'product', query: { type:this.type}});
        history.go(0);
    },
    signOut:function(){
          sessionStorage.removeItem('uname');
          this.uname='';
    },
    kwQuery:function(){
      if(this.kw){
          this.$router.push({path:'product', query: { kw:this.kw,type:1}});
          history.go(0);
      }
      else{
        this.kw=""
        this.$router.push({path:'product', query: { kw:this.kw,type:1}});
          history.go(0);
      }
          
    },
    toPerson:function(){
      this.$router.push({path:'personal'})
    }
  },


}
</script>

<style scoped>
</style>
