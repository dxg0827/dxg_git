<template>
<div class="register_box">
<div class="register">
  
  <ul>
    <li>
      <span>用户名：</span>
      <input type="text" v-model="uname" placeholder="请输入用户名"/>
      <em></em>
      <i></i>
    </li>
    <li>
      <span>密码：</span>
      <input type="password" v-model="upwd" placeholder="请输入密码"/>
      <em></em>
      <i></i>
    </li>
    <li>
      <span>重复密码：</span>
      <input type="password" v-model="upwd2" placeholder="请重复输入密码"/>
      <em></em>
      <i></i>
    </li>
    <li>
      <span>手机号：</span>
      <input type="tel" v-model="phone" placeholder="请输入手机号"/>
      <em></em>
      <i></i>
    </li>
    <li class="li_btn">
      <button  @click="doRegister" type="button">提交注册</button>
    </li>
  </ul>
  </div>
</div>
</template>



<script>
export default{
        data(){
          return{
            phone:'',
            uname:'',
            upwd:'',
            upwd2:'',
            email:''
          }
        },
        methods:{
        doRegister:function(){
          if(this.upwd==this.upwd2){

          //得到用户名和密码
          // this.uname this.upwd
         // console.log(this.uname+'-->'+this.upwd);
          var url = 'http://localhost/mytrip/trip/data/user/register.php?&uname='+this.uname+'&upwd='+this.upwd+'&phone='+this.phone;
          //发给服务器
          this.$http.get(url).then(
            (response)=>{
              console.log(response);
              if(response.data.code == 1){
                this.uid = response.data.uid;
                this.uname = response.data.uname;
                //js跳转到main
                alert('注册成功!');
                this.$router.push('/login');
                console.log(this.uname);
              }
              else if(response.data.code==2){
                 alert('注册失败，检测到该用户已经注册');
              }
              else{
                 alert('注册失败，请重新注册！');

              }
            }) 
            }
            else{
               alert('输入的密码前后不一致,请重新输入');
            }
        }
      }
      }
  
</script>