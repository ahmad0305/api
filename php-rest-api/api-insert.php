<?php
header("Content-type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Method:POST");
header("Access-Control-Allow-Header:Access-Control-Allow-Header,Content-type,Access-Control-Allow-Method,Authorization,X-Requested-With");
$data = json_decode(file_get_contents("php://input"), true);
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];
include "config.php";
$sql = "INSERT INTO `employ`(`emply_name`, `age`, `city`) VALUES ('{$name}','{$age}','{$city}')";
if(mysqli_query($con,$sql)){
echo json_encode(array('message'=> 'Data inserted successfully', 'status'=> true));
}else{
    echo json_encode(array('message'=> 'Data not inserted', 'status'=> false));
}


?>
