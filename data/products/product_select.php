<?php
require '../init.php';
@$name = $_REQUEST['name'] or $name=null;
@$type = $_REQUEST['type'] or $type=1;
if($name){
    $sql="SELECT * FROM mf_product WHERE title1 LIKE '%{$name}%'";

}
else{
    $sql="SELECT * FROM mf_product WHERE type=$type";
}
$result = mysqli_query($conn,$sql);
$output[] = mysqli_fetch_all($result, MYSQLI_ASSOC);
var_dump($output);
exit();
echo json_encode($output);