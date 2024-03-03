<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Ajax Pagination</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h1>PHP & Ajax Pagination</h1>
    </div>

    <div id="table-data">
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
<script>
    $(document).ready(function(){
      function loadpage(page){
         $.ajax({
          url:'ajax-pagination.php',
          type:'POST',
          data:{page_no :page},
          success:function(data){
           $("#table-data").html(data);
          }
         })
      }
      loadpage();

      //next page
      $(document).on("click", "#pagination a", function(e){
              e.preventDefault();
              var page_id=$(this).attr("id");
              loadpage(page_id);
      })
    })
</script>
  </body>
</html>