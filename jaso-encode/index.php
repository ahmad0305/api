<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Read JSON Data</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h1>Read JSON Data</h1>
    </div>

    <div id="table-data">
      <table id="load-data" border="1" cellpadding="10px" width="100%">
<tr>
    <td>Id</td>
    <td>Name</td>
    <td>Age</td>
    <td>City</td>
</tr>
      </table>
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
  <script>
    $(document).ready(function(){
     $.ajax({
        url:"fetch-json.php",
        type:"Post",
        //data: {id : 2},  // if you want to single records
           dataType:"JSON",
        success:function(data){
            $.each(data, function(key,value){
                $("#load-data").append("<tr><td>"+value.id+"</td><td>"+ value.emply_name+"</td><td>" +value.age+"</td><td>"+value.city+"</td></tr>");

            })
            //console.log(data);
        }
     });
    // $.getJSON(
    //     "fetch-json.php",
    //     function(data){
    //          $.each(data, function(key,value){
    //             $("#table-data").append(value.id+" "+ value.emply_name+" "+ value.age+" "+ value.city+"<br>");

    //         });
    //          //console.log(data);
    //      }
    // );
    });
  </script>
</body>
</html>