<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & Ajax</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h1>PHP & Ajax with $.POST</h1>
    </div>

    <div id="table-data">
      <form id="submit_form">  
        <table width="100%" cellpadding="10px">
          <tr>
            <td width="150px"><label>First Name</label></td>
            <td><input type="text" name="fname" id="fname" /></td>
          </tr>
          <tr>
            <td><label>Last Name</label></td>
            <td><input type="text" name="lname" id="lname" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="button" id="submit" value="Save" /></td>
          </tr>
        </table>
      </form>  
      <div id="response"></div>  
    </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
  <script>
    $(document).ready(function(){
     $("#submit").click(function(){
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        if(fname == "" || lname == ""){
        $("#response").fadeIn();
        $("#response").html("All Fields are required.");
      }else
        $.post(
            "save-form.php",
            $("#submit_form").serialize(),
            function(data){
               if(data== 1){
                $("#submit_form").trigger("reset");
                $("#response").fadeIn();
                $("#response").html("Data submited seccessfully.");
                setTimeout(function(){
                    $("#response").fadeOut();
                }, 5000);
               }
            }
        );
     })
    });
  </script>
</body>
</html>