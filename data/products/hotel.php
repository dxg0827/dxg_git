<?php
    require_once('../init.php');
    $sql = "SELECT * FROM hotel";
    $result = mysqli_query($conn,$sql);
    //$row= mysqli_fetch_assoc($result);
    //var_dump($row);
    $output['data'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
    