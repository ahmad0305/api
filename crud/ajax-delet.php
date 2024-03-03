<?php
$id= $_POST['id'];
$conn = mysqli_connect("localhost","root","","testajax") or die("Connection Failed");
$sql="DELETE FROM `student` WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}
