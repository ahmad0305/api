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
      
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
  <script>
    $(document).ready(function(){
    //  $.ajax({
    //     url:"json/my.json",
    //     type:"GET",
    //     success:function(data){
    //         $.each(data, function(key,value){
    //             $("#table-data").append(value.id+" "+ value.title+"<br>");

    //         })
    //         //console.log(data);
    //     }
    //  });
    $.getJSON(
        "json/my.json",
        function(data){
             $.each(data, function(key,value){
                $("#table-data").append(value.id+" "+ value.title+"<br>");

            });
             //console.log(data);
         }
    );
    });
  </script>
</body>
</html>