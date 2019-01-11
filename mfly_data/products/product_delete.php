<?php
require '../init.php';
@$pid = $_REQUEST['pid'] or die('name required');
$sql="DELETE FROM mf_product WHERE pid=$pid";
$result = mysqli_query($conn,$sql);
$output[] = mysqli_fetch_all($result, MYSQLI_ASSOC);
var_dump($output);
exit();
echo json_encode($output);