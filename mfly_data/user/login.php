<?php
/**
* 接收客户端提交的登录信息：name、pwd，执行登录验证；
* 返回表明登录成功或失败的JSON消息：
* 如：{"code":200, "msg":"check passed"}
*/
require_once('../init.php');
header('Content-Type: application/json;charset=UTF-8');
@$uname = $_REQUEST['uname'] or die('{"code":401,"msg":"uname required"}');
@$upwd = $_REQUEST['upwd'] or die('{"code":402,"msg":"upwd required"}');


$sql = "SELECT uid FROM user WHERE uname='$uname' AND upwd='$upwd'";
$result = mysqli_query($conn,$sql);

if(!$result){       //SQL语句执行失败
  echo('{"code":500, "msg":"db execute err"}');
}else {
  $row = mysqli_fetch_assoc($result);
  if(!$row){        //用户名或密码错误
    echo('{"code":201, "msg":"uname or upwd err"}');
  }else {           //登录成功
    
	session_start();
    $_SESSION['loginUname'] = $uname;
    $_SESSION['loginUid'] = $row["uid"];
	
	//setcookie("uid",$row,time()+3600,"/");
	//setcookie("uname",$uname,time()+3600,"/");
			
      echo("{\"code\":200, \"msg\":\"login succ\",\"uid\":$row[uid],\"uname\":\"$uname\"}");
	  
	

  }
}