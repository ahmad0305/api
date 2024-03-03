<?php
include('db.php');
$select= "select * from user";
$qry= mysqli_query($con,$select);
$count= mysqli_num_rows($qry);
header('Content-type:application/json');
if($count>0){
 while($row=mysqli_fetch_assoc($qry)) {
    $arr[]=$row;
 }
 echo json_encode(['status'=>'true','date'=>$arr,'result'=>'found']);  
}else{
    echo json_encode(['status'=>'true','date'=>'No data found','result'=>'not']); 
}
?>