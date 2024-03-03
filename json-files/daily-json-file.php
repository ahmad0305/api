<?php
$conn = mysqli_connect("localhost","root","","testajax") or die("Connection Failed");
$sql=mysqli_query($conn,"SELECT * FROM employ");
$row=mysqli_fetch_all($sql, MYSQLI_ASSOC);
$json_encode = json_encode($row,JSON_PRETTY_PRINT);
$file_name= "my-" . date("d-m-y") . ".json";
if(file_put_contents("json/{$file_name}", $json_encode)){
    echo $file_name . " File created.";
} else{
    echo "Can't Insert data in JSON file";
}
