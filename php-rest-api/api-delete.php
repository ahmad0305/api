<?php
header("Content-type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Method:DELETE");
header("Access-Control-Allow-Header:Access-Control-Allow-Header,Content-type,Access-Control-Allow-Method,Authorization,X-Requested-With");
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['sid'];

include "config.php";

$sql = "DELETE FROM `employ` WHERE id={$id}";
if(mysqli_query($con,$sql)){
echo json_encode(array('message'=> 'Data Deleted Successfully', 'status'=> true));
}else{
    echo json_encode(array('message'=> 'Data not Deleted', 'status'=> false));
}


?>
