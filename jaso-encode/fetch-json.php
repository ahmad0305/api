<?php
$conn = mysqli_connect("localhost","root","","testajax") or die("Connection Failed");
$sql=mysqli_query($conn,"SELECT * FROM employ");
//$sql=mysqli_query($conn,"SELECT * FROM employ where id={$_POST['id']}");
$row=mysqli_fetch_all($sql, MYSQLI_ASSOC);
echo json_encode($row);


// The file_get_contents() reads a file into a string.

//This function is the preferred way to read the contents of a file into a string. It will use memory mapping techniques, if this is supported by the server, to enhance performance.

