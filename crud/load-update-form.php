<?php
$id= $_POST['id'];
$conn = mysqli_connect("localhost","root","","testajax") or die("Connection Failed");
$sql=mysqli_query($conn,"select * from student where id='$id'");
$output='';
if(mysqli_num_rows($sql)>0){    
    while($row=mysqli_fetch_assoc($sql)){
        
        $output .= "<tr>
        <td>First Name</td>
        <td><input type='text' id='edit-fname' value='{$row["first_name"]}'>
        <input type='text' id='edit-id' hidden value='{$row["id"]}'>
        </td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td><input type='text' id='edit-lname' value='{$row["last_name"]}'></td>
    </tr>
    <tr>
        <td></td>
        <td><input type='submit' id='edit-submit' value='Update'></td>
    </tr>";     

    }
    mysqli_close($conn);
    echo $output;
}else{

}