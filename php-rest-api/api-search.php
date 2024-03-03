<?php
header("Content-type: application/json");
header('Access-Control-Allow-Origin: *');
//$data = json_decode(file_get_contents("php://input"), true);

//$search = $data['search'];
$search = isset($_GET['search']) ? $_GET['search'] : die();

include "config.php";
$sql = mysqli_query($con,"SELECT * FROM `employ` WHERE emply_name LIKE '%{$search}%'") or die("SQL QUERY FAILD");
if(mysqli_num_rows($sql)> 0){
$result = mysqli_fetch_all($sql , MYSQLI_ASSOC);
echo json_encode($result);
}else{
    echo json_encode(array('message'=> 'Data not Search', 'status'=> false));
}


?>
