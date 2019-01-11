<template>
    <div class="orange">
        <div class="register">
            <h2>查看个人信息</h2>
            <ul>
                <li>
                    <span>用户名：</span>
                    <dd>dxg</dd>
                </li>
                <li>
                    <span>昵称：</span>
                    <dd>董</dd>
                </li>
                <li>
                <span>性别：</span>
                 <dd>男</dd>
                
                <em></em>
                <i></i>
                </li>
                <li>
                <span>手机号：</span>
                <dd>18983415297</dd>
               
                </li>
                <li>
                <span>email：</span>
                <dd>634177538@qq.com</dd>
                </li>
                <li>
                <span>生日：</span>
                <dd>1994-10-02</dd>
                </li>
                <li class="li_btn">
                <button @click="toEditMessage">编辑个人信息</button>
                </li>
            </ul>
        </div>
    </div>
</template>
<script type="text/javascript">
    export default{
        data(){
            return{
                msg:"个人信息页面",
                uid:sessionStorage.uid
            }
        },
        methods:{
            toEditMessage:function(){
                this.$router.push({path:'/personal/editmessage',query:{uid:this.uid}})
            }
        },
        mounted:function(){
            console.log(this.uid);
        }
    }
</script>
<style scoped>
    .orange{
        color:red;
    }
    .orange h1{
        text-align:center;
    }
    .register dd{
        font-size:14px;
    }
    .li_btn button{
            background:#1e90ff;
    }
</style>