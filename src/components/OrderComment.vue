<template> 
        <div>
            <div class="cart_con">
                <div class="cartcon_title">
                    <span>订单类型</span>
                    <span>产品信息</span>
                    <span>付款金额</span>
                    <span>有效时间</span>
                    <span>订单状态</span>
                    <span>订单完成时间</span>
                    
                </div>
                <ul>  
                    <li>
                        <span>酒店</span>
                        <a class="cart_img"></a>
                        <a href="" class="cart_title">亚丁假日酒店</a>
                        <i>¥1599</i>
                        <div>
                            <span>2018-05-20</span>
                        </div>
                        <strong>已支付未消费</strong>
                        <span>2018-05-20</span>
                    </li>
                </ul>
            </div>
            <div class="OrderComment">
                    <h1>订单评价</h1>
                    <textarea></textarea>
                    <a @click="OrderComment">发表评价</a>
            </div>
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
            OrderComment:function(){
                var r=confirm("确认发表此评价吗？");
                    if (r==true){
                       alert('评价成功！')
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