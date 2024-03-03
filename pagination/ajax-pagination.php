<?php

$conn = mysqli_connect("localhost","root","","testajax") or die("Connection Failed");

$limit_per_page = 5;

  $page = "";
  if(isset($_POST["page_no"])){
    $page = $_POST["page_no"];
  }else{
    $page = 1;
  }

  $offset = ($page - 1) * $limit_per_page;
$sql=mysqli_query($conn,"SELECT * FROM student LIMIT {$offset},{$limit_per_page}");
$output='';
if(mysqli_num_rows($sql)>0){
    $output='       <table border="1" width="100%" cellspacing="0" cellpadding="10px">
    <tr>
    <th width="100px">Id</th>
    <th>Name</th>
             
    </tr>';
    while($row=mysqli_fetch_assoc($sql)){
        
        $output .= "<tr><td align='center'>{$row["id"]}</td><td>{$row["first_name"]} {$row["last_name"]}</td></tr>";

    }
    $output .="</table>";
    $sql=mysqli_query($conn,"SELECT * FROM student");
    $total_records= mysqli_num_rows($sql);
    $totalpage = ceil($total_records/$limit_per_page);

    $output .='<div id="pagination">';
    for($i=1; $i<=$totalpage; $i++){
        if($i==$page){
            $activ_class='active';
        }else{
         $activ_class='';
        }
    $output .="<a class='{$activ_class}' id='{$i}' href=''>{$i}</a>";
    }    
    $output .='</div>';

    mysqli_close($conn);
    echo $output;

}

?>