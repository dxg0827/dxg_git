<template>
    <div>
       
        <div class="main container">
            <h1>订单中心</h1>
            <div class="cart_con">
                <div class="cartcon_title">
                    <span>订单类型</span>
                    <span>产品信息</span>
                    <span>付款金额</span>
                    <span>有效时间</span>
                    <span>订单状态</span>
                    <span>操作</span>
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
                        <a href="javascript:void(0)" @click="Cancel">取消订单</a>
                    </li>
                    <li>
                        <span>酒店</span>
                        <a class="cart_img"></a>
                        <a href="" class="cart_title">亚丁假日酒店</a>
                        <i>¥1599</i>
                        <div>
                            <span>2018-05-20</span>
                        </div>
                        <strong>已消费未评价</strong>
                        <a href="javascript:void(0)" @click="OrderComment">去评价</a>
                    </li>
                    <li>
                        <span>酒店</span>
                        <a class="cart_img"></a>
                        <a href="" class="cart_title">亚丁假日酒店</a>
                        <i>¥1599</i>
                        <div>
                            <span>2018-05-20</span>
                        </div>
                        <strong>已消费已评价</strong>
                         <a  href="">查看详情</a>
                    </li>
                    <li>
                        <span>酒店</span>
                        <a class="cart_img"></a>
                        <a href="" class="cart_title">亚丁假日酒店</a>
                        <i>¥1599</i>
                        <div>
                            <span>2018-05-20</span>
                        </div>
                        <strong>已取消</strong>
                        <a  href="">查看详情</a>
                        
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</template>
<script type="text/javascript">
    export default{
        data(){
            return{
                
            }
        },
        methods:{
            Cancel:function(){
                var r=confirm("确认要取消该订单吗？");
                    if (r==true){
                       alert('已取消');
                       this.$router.go(0);
                    }
                    else{  
                    }
                //console.log(this.uid);
            },
            OrderComment:function(){
                this.$router.push({path:'ordercomment', query: { type:this.type}})
            }
        }
    }
</script>
<style scoped>
   
</style>