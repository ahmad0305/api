<?php
$search_value= $_POST["search"];
$conn = mysqli_connect("localhost","root","","testajax") or die("Connection Failed");
$sql=mysqli_query($conn,"SELECT * FROM student WHERE first_name LIKE '%{$search_value}%' OR last_name LIKE '%{$search_value}%'");
if(mysqli_num_rows($sql)>0){
    $output='       <table id="main" border="1" width="100%" cellspacing="0" cellpadding="10px">
    <tr>
        <td>ID</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Action</td>     
    </tr>';
    while($row=mysqli_fetch_assoc($sql)){
        
        $output .= "<tr><td>{$row["id"]}</td><td>{$row["first_name"]}</td><td>{$row["last_name"]}</td><td><button class='delete-btn' data-id='{$row["id"]}'>Delete</button><button class='edite-btn' data-eid='{$row["id"]}'>Update</button></td></tr>";

    }
    $output .="</table>";
    mysqli_close($conn);
    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}
?>