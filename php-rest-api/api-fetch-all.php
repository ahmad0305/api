<?php
header("Content-type: application/json");
header('Access-Control-Allow-Origin: *');
include "config.php";
$sql = mysqli_query($con,"SELECT * FROM `employ`") or die("SQL QUERY FAILD");
if(mysqli_num_rows($sql)> 0){
$result = mysqli_fetch_all($sql , MYSQLI_ASSOC);
echo json_encode($result);
}else{
    echo json_encode(array('message'=> 'Data not found', 'status'=> false));
}


?>
