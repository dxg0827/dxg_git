<?php
/**
*分页获取产品信息
*请求参数：
  pageNum-需显示的页号；默认为1
  type-可选，默认为1
*输出结果：
  {
    totalRecord: 37,
    pageSize: 6,
    pageCount: 7,
    pageNum: 1,
    type: 2,
    data: [{},{} ... {}]
  }
*/
require('../init.php');
//加载的数据的页码， （默认为1）
@$pageNo = $_REQUEST['pageNo'] or $pageNo = 1;
@$pageSize = $_REQUEST['pageSize'] or $pageSize = 3;
@$type = $_REQUEST['type'] or $type = 2;
@$kw = $_REQUEST['kw'] or $kw ="";


//php获取的是一个字符串，  获取数据时需要强制转换为  int类型
$output['kw'] = $kw;
$output['pageNo'] = intval($pageNo);
$output['type'] = intval($type);
$output['pageSize'] = intval($pageSize);

//获取总记录数和总页数

if(empty($kw)){
  $sql = "SELECT COUNT(*) FROM mf_product WHERE type=$type";
  
}
else{
  $sql = "SELECT COUNT(*) FROM mf_product WHERE  pid LIKE '%{$kw}%'";
  
}

 

$result = mysqli_query($conn,$sql);
$output['totalRecord'] = intval( mysqli_fetch_row($result)[0] );
$output['pageCount'] = ceil($output['totalRecord']/$output['pageSize']);

//获取指定页中的数据
$start = ($output['pageNo']-1)*$output['pageSize'];
$count = $output['pageSize'];
if(empty($kw)){
  $sql = "SELECT * FROM mf_product WHERE type=$type ORDER BY pid DESC LIMIT $start,$count";

}
else{
  $sql = "SELECT * FROM mf_product WHERE pid LIKE '%{$kw}%' ORDER BY pid DESC LIMIT $start,$count";
}
//$sql = "SELECT * FROM mf_product WHERE type=$type AND  title1 LIKE '%{$name}%'  ORDER BY pid DESC LIMIT $start,$count";

$result = mysqli_query($conn,$sql);
$output['data'] = mysqli_fetch_all($result, MYSQLI_ASSOC);


echo json_encode($output);