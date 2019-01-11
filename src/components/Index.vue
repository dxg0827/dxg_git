<template>
<div>
    <!--banner-->
  <div class="banner">
  <!-- 练习：编写banner的html和css-->
  <!-- 图片列表-->
  <ul>
    <li style="display:block;">
    <img src="../assets/images/banner/b1.jpg"alt="">
    <a  class="link"></a></li>
    <li style="display:block;">
    <img src="../assets/images/banner/b2.jpg"alt="">
    <a  class="link"></a></li>
    <li style="display:block;">
    <img src="../assets/images/banner/b3.jpg"alt="">
    <a  class="link"></a></li>
    <li style="display:block;">
    <img src="../assets/images/banner/b4.jpg"alt="">
    <a  class="link"></a></li>

  </ul>
  <!-- 左右箭头-->
    <span class="cut prev"></span>
    <span class="cut next"></span>
    <!-- 小圆点指示器-->
    <div class="indicator">
      <a href="" class="cur"></a><a href=""></a><a href=""></a><a href=""></a>
    </div>
  </div>
    <!--main-->
    <div class="main container">
      <div class="ind_con1">
        <h2 class="title">
          <a class="more">more</a>热门景区
        </h2>
        <ul class="clearfloat">
          <li><router-link to="/termini" class=""><img src="../assets/images/termini/daocheng.jpeg" alt=""/></router-link>
              <p>稻城亚丁</p>
          </li>
          <li><a href="#" class=""><img src="../assets/images/termini/seda.jpg" alt=""/></a>
               <p>色 达</p>
          </li>
          <li><a href="#" class=""><img src="../assets/images/termini/jiuzhaigou.jpg" alt=""/></a>
              <p>九寨沟</p>
          </li>
        </ul>
      </div>
      <div class="ind_con1">
        <h2 class="title">
          <a class="more">more</a>热门套餐
        </h2>
        <ul class="clearfloat">
          <li><router-link to="/travelmall" class=""><img src="../assets/images/termini/jiuzhaigou.jpg" alt=""/></router-link>
              <p>九寨沟一日游</p>
          </li>
          <li><a href="#" class=""><img src="../assets/images/termini/daocheng.jpeg" alt=""/></a>
              <p>稻城亚丁二日游</p>
          </li>
          <li><a href="#" class=""><img src="../assets/images/termini/seda.jpg" alt=""/></a>
               <p>色达一日游</p>
          </li>
          
        </ul>
      </div>
      <div class="ind_con2 clearfloat">
        <div class="ind_about">
        <h2>
          <router-link to="/about" class="title">
           关于MagnetFly
          </router-link>
        </h2>
          <p>
             随着国家综合国力的加强，我国的旅游行业也迎来了蓬勃发展时期，随着Internet技术的发展，互联网在中国逐步普及,人们对网络的需求也日益增长,利用计算机实现旅游资源的管理势在必行。MagnetFly旅游网从初步调查开始，着手项目的开发...
              <router-link to="/about">查看更多</router-link>
          </p>
        </div>
        <div class="ind_news">
          <h2 class="title">
            <a href="#" class="more">more</a><router-link to="/travelnote">旅游攻略</router-link>
          </h2>
          <ul>
            <li><span>2018-02-21</span><router-link to="/travels">杭州那些私藏江南韵味的地方怎么拍，你才好看？</router-link></li>
            <li><span>2018-02-21</span><router-link to="/travels">初次见面请多关照~泰国旅行扫盲指南</router-link></li>
            <li><span>2018-02-21</span><router-link to="/travels">金色青海，五彩甘南</router-link></li>
            <li><span>2018-02-21</span><router-link to="/travels">台湾环岛交通篇，这有你想要的所有自由行秘籍</router-link></li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import $ from 'jquery'
export default {
  data () {
    return {
    }
  },
  mounted(){
    this.carousel()
  },
  methods:{
    carousel:function(){
      var number=$(".banner ul li").size()-1;//图片的数量
      var cur=0;//当前显示的图片
      var timer=0;//定时器
      console.log(number);

       //下一个
    function slideNext(){
        if(cur<number){
            $(".banner ul li").eq(cur).css({'z-index':10}).stop().fadeOut();
            $(".banner ul li").eq(cur+1).css({'z-index':20}).stop().fadeIn();
            $(".indicator a").removeClass().eq(cur+1).addClass("cur");
            cur+=1;
        }else{
            $(".banner ul li").eq(cur).css({'z-index':10}).stop().fadeOut();
            $(".banner ul li").eq(0).css({'z-index':20}).stop().fadeIn();
            $(".indicator a").removeClass().eq(0).addClass("cur");
            cur=0;
        }
    }
    //上一个
    function slidePrev(){
        if(cur>0){
            $(".banner ul li ").eq(cur).css({'z-index':10}).stop().fadeOut();
            $(".banner ul li ").eq(cur-1).css({'z-index':20}).stop().fadeIn();
            $(".indicator a").removeClass().eq(cur-1).addClass("cur");
            cur-=1;
        }else{
            $(".banner ul li ").eq(cur).css({'z-index':10}).stop().fadeOut();
            $(".banner ul li ").eq(number).css({'z-index':20}).stop().fadeIn();
            $(".indicator a").removeClass().eq(number).addClass("cur");
            cur=number;
        }
    }
    timer=setInterval(slideNext,3000);

    $(".banner").mouseover(function(){
        clearInterval(timer);
    });
    $(".banner").mouseout(function(){
        timer=setInterval(slideNext,3000)
    });

    //上一个、下一个
    $(".banner .prev").click(function(){
        slidePrev();
    });
    $(".banner .next").click(function(){
        slideNext();
    });

     $(".indicator>a").mouseover(function(){
        var now=$(this).index();//获取鼠标移入的是第几个a标记
        $(".indicator>a").removeClass();//删除a标记中的class=cur
        $(this).addClass("cur");//为此a标记添加cur样式
        $(".banner ul li").eq(cur).css({'z-index':10}).stop().fadeOut();//隐藏当前的图片
        $(".banner ul li").eq(now).css({'z-index':20}).stop().fadeIn();//显示和a序列号一样的图片
        cur=now;//为变量cur重新赋值，以便于再次启用定时器的时候，从当前显示的图片开始播放
    });
    }
  }
}

</script>

<style scoped>
</style>
