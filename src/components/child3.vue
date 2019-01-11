<template>
    <div class="register">
    <h2>修改密码</h2>
        <ul>
            <li>
                <span>用户名：</span>
                <input type="text"disabled="disabled" value="dxg"  />
                <em></em>
                <i></i>
            </li>
            <li>
                <span>旧密码：</span>
                <input type="password" value="1"  />
                <em></em>
                <i></i>
            </li>
            <li>
                <span>新密码：</span>
                <input type="password" value="1"  />
                <em></em>
                <i></i>
            </li>
            <li>
                <span>确认新密码：</span>
                <input type="password" value="1"  />
                <em></em>
                <i></i>
            </li>
            <li class="li_btn">
            <button @click="EditPwd">确认修改</button>
            </li>

        </ul>
    </div>
</template>
<script type="text/javascript">
    export default{
        data(){
            return{
                msg:"修改密码页面"
            }
        },
        methods:{
            EditPwd:function(){
                var r=confirm("确认要修改密码吗？");
                    if (r==true){
                       alert('修改成功！')
                    }
                    else{  
                    }
            }
        }
    }
</script>
<style scoped>
    .orange{
        color:yellow;
    }
</style>