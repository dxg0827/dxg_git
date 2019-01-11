<template>
<div class="login_box">
 <form action="">
  <div class="container">
    <div class="login">
      <h2>用户登录</h2>
      <dl class="clearfloat">
        <dt><span class="tips" id="uname_prompt_text"></span>用户名：</dt>
        <dd>
          <input  v-model="uname" type="text" id="unames" placeholder="请输入用户名"/>
          <em class="icon_user"></em>
          <i class="icon_error" id="uname_prompt_icon"></i>
        </dd>
      </dl>
      <dl>
        <dt><span class="tips"  id="pwd_prompt_text">请输入密码</span>密码：</dt>
        <dd>
          <input type="password" v-model="upwd" id="pwd" placeholder="密码"/>
          <em class="icon_pwd"></em>
          <i class="icon_error" id="pwd_prompt_icon"></i>
        </dd>
      </dl>
      <button @click="doLogin" type="button" id="login">立 即 登 录</button>
    </div>
  </div>
 </form>
</div>

</template>

<script>
export default{
      data:function(){
        return {
          uname:'',
          upwd:'',
          uid:''
        }
      },
      methods:{
        doLogin:function(){
          //得到用户名和密码
          // this.uname this.upwd
          console.log(this.uname+'-->'+this.upwd);
          var url = 'http://localhost/1.php';
          //发给服务器
          this.$http.get(url).then(
            (res)=>{
            /*  console.log(JSON.parse(response.bodyText));
              if(response.data.code == 200){
                this.uid = response.data.uid;
                this.uname = response.data.uname;
                console.log(response.data);
                //js跳转到main
                alert('登录成功!');
                history.go(0)
                sessionStorage.setItem('uname',this.uname);
                sessionStorage.setItem('uid',this.uid);
                this.$router.push('/index');
                console.log(this.uname);
              }
              else{
                 alert('用户名或密码不正确！');

              }*/
              console.log(res.data);
            })
        }
      }
  }
</script>

<style scoped>
</style>
