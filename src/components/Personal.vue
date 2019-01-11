<template>
    <div>
        <div class="breadcrumb">
            <div class="container">
                <h2>
                <router-link to="/prodetail">首页</router-link>&gt;<router-link to="/prodetail">个人中心</router-link>
                </h2>
            </div>
        </div>
        <div class="navPerson">
            <ul >
                <li><router-link to="/personal/child1">查看个人信息</router-link></li>
                <li><router-link to="/personal/child2">查看订单</router-link></li>
                <li><router-link to="/personal/child3">修改密码</router-link></li>
            </ul>
        </div>
        <div class="router-view">
            <router-view ></router-view>
        </div>
    </div>
</template>