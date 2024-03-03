<?php
header("Content-type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Method:PUT");
header("Access-Control-Allow-Header:Access-Control-Allow-Header,Content-type,Access-Control-Allow-Method,Authorization,X-Requested-With");
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];
include "config.php";

$sql = "UPDATE `employ` SET `emply_name`='{$name}',`age`='{$age}',`city`='{$city}' WHERE id={$id}";
if(mysqli_query($con,$sql)){
echo json_encode(array('message'=> 'Data updated successfully', 'status'=> true));
}else{
    echo json_encode(array('message'=> 'Data not updated', 'status'=> false));
}


?>
