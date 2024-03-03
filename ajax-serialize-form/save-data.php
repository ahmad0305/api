<?php
$conn = mysqli_connect("localhost","root","","testajax") or die("Connection Failed");
$name= $_POST['fullname'];
$age= $_POST['age'];
$gender= $_POST['gender'];
$country= $_POST['country'];
$sql="INSERT INTO `ajax-form`( `name`, `age`, `gender`, `country`) VALUES ('$name','$age','$gender','$country')";
if(mysqli_query($conn,$sql)){
    echo "Hello {$name} your record is saved";
}else{
    echo "Can't save records";
}