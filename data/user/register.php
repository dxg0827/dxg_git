<?php
/**
*注册新用户
*请求参数：
  uname-用户名
  upwd-密码
  phone-电话号码
*输出结果：
* {"code":1,"uid":3,"uname":"test"}
* 或
* {"code":500}
*/
@$uname = $_REQUEST['uname'] or die('uname required');
@$upwd = $_REQUEST['upwd'] or die('upwd required');
@$phone = $_REQUEST['phone'] or die('phone required');

require('../init.php');
$output['uname']=$uname;

$sql2="SELECT * FROM user WHERE uname='$uname'";
$result2 = mysqli_query($conn,$sql2);
$row=mysqli_fetch_array($result2);

if($row){
  $output['code'] = 2;
  

  echo json_encode($output);
}
else{
    $sql = "INSERT INTO user(uname,upwd,phone) VALUES('$uname','$upwd','$phone')";
  $result = mysqli_query($conn,$sql);
  if($result){
    $output['code'] = 1;
    $output['uid'] = intval(mysqli_insert_id($conn));

  }else {
    $output['code'] = 500;
  }
  echo json_encode($output);
}



