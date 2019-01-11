<template>
    <div class="register">
    <h2>编辑个人信息</h2>
        <ul>
            <li>
            <span>用户名：</span>
            <input type="text" value="dxg" id="uname" />
            <em></em>
            <i></i>
            </li>
            <li>
            <span>性别：</span>
            <select id="sex">
                <option value="男">男</option>
                <option value="女">女</option>
            </select>
            <em></em>
            <i></i>
            </li>
            <li>
            <span>昵称：</span>
            <input value="董" id="nickname"/>
            <em></em>
            <i></i>
            </li>
            <li>
            <span>手机号：</span>
            <input type="text"value="18983415297"  placeholder="请输入手机号"/>
            <em></em>
            <i></i>
            </li>
            <li>
            <span>email：</span>
            <input type="text"value="634177538@qq.com" placeholder="请输入邮箱"/>
            <em></em>
            <i></i>
            </li>
            <li>
            <span>生日：</span>
            <input type="date"value="1994-10-02"/>
            </li>
            <li class="li_btn">
            <button @click="saveMessage">保存个人信息</button>
            </li>
        </ul>
    </div>
</template>
<script type="text/javascript">
    export default{
        data(){
            return{
                msg:"个人信息页面",
                uid:this.$route.query.uid
            }
        },
        methods:{
            saveMessage:function(){
                var r=confirm("确认要保存修改吗？");
                    if (r==true){
                       alert('已保存')
                       this.$router.go(-1);
                    }
                    else{  
                    }
                console.log(this.uid);
            }
        },
        mounted:function(){
            
        }
    }
</script>