<?php
$first_name= $_POST['fname'];
$last_name=$_POST['lname'];
$conn = mysqli_connect("localhost","root","","testajax") or die("Connection Failed");
$sql="INSERT INTO `student`( `first_name`, `last_name`) VALUES ('$first_name','$last_name')";
if(mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}
