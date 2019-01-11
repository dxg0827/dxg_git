<template>

<div>
  <div class="breadcrumb">
  <div class="container">
    <h2>
      <a href="">首页</a>&gt;<a href="">旅游攻略</a>
    </h2>
  </div>
</div>
<!--页面主体-->
<div class="main container">
  <div class="about">
    <h1>{{this.list.gtitle}}</h1>
    <p class="pubtitle">
      &nbsp;&nbsp;<span>{{this.list.gtime}}</span>
    </p>
    <div class="about_img"><img :src="require('../assets/images/tnote/'+this.list.gpic)" alt=""/></div>
    <!--<p>
     以上照片来自一个神秘的组织——握草小疯队。标志是手握一草，对镜头痴笑。
       这已经是我们第二次见面了，而我们也已早早约好了第三次。4月到5月，隔了一个月再见却毫无陌生感。缘分就是那么不可思议，只需要一个月，就能让很近的人很远，也能让很远的人很近。
        做个简单介绍吧，从左到右——
        老司机：老司机有许多法力无边的绰号，但我们只爱叫他老司机。老司机自拍老老哒，真人嫩嫩哒～
        艳艳：希望下一次还能继续一起狼人杀，一定要赢啊～
        师太：师太目前处于人生的自我怀疑期，觉得自己干什么都是半吊子——拍照半吊子，视频半吊子，写作半吊子，画画半吊子……不过呢，出去玩一直是全吊子～
        男男：握草小疯队的灵魂人物是男男，自从她手握一把草的照片出现在群里，这辈子她都与握草二字脱不开关系了她看到这照片后吐槽道：一看腿摆的姿势就知道谁是摄影师谁是模特！
       黄老师和汪老师：黄老师有一双逆天长美腿，汪老师是带民国气质的女神，她们莫名很酷。
       慕慕子：这是身高167，体重不过百的慕慕子，这是花椒主播，微博红人慕慕子，这是每天都超级小仙女的慕慕子。
      末末： 因为东极岛的游记认识了末末，我们在锦溪结的“梁子”这次终于在杭州解了。
      磨叽：这一趟旅程，我们有老司机，有国际女司机（男男）。夜夜开车的结果，是产生了一个人肉行车记录仪。
    </p>-->
    <p>{{this.list.gdetail}}</p>
        
  </div>
</div>
</div>
</template>

<script>
export default {
  data () {
    return {
      gid:this.$route.query.gid,
      list:{},
    }
  },
  mounted:function(){
    console.log("id是"+this.gid);

      this.$http.get('http://localhost/mytrip/trip/data/products/travels.php?gid='+this.gid).then(
            (response)=>{
              //console.log(response.data);
            this.list = response.data;// 保存产品列表
              console.log(this.list);
             
              
            })


  }
}
</script>

<style scoped>
</style>
