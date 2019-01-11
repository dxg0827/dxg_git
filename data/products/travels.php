<?php
    @$gid = $_REQUEST['gid'] or die('pid required');
    require_once('../init.php');
    $sql = "SELECT * FROM gnote WHERE gid=$gid";
    $result = mysqli_query($conn,$sql);
    $row= mysqli_fetch_assoc($result);
    
    if($row){
        $output = $row;
      }
    //var_dump($row);
    echo json_encode($output);
    