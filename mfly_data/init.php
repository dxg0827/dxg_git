<?php

$conn = mysqli_connect('127.0.0.1','root','','trip',3306);
mysqli_query($conn, "SET NAMES UTF8");
header('Access-Control-Allow-Origin:http://localhost:8080');
