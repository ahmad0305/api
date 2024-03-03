<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Ajax Load More Pagination</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h1>PHP & Ajax Load More Pagination</h1>
    </div>

    <div id="table-data">
      <form id="submit_form">
        <table width="100%" cellpadding="10px">
            <tr>
                <td width="150px"><label for="">Name</label></td>
                <td><input type="text" name="fullname" id="fullname" /></td>
            </tr>
            <tr>
                <td><label for="">Age</label></td>
                <td><input type="number" name="age" id="age" /></td>
            </tr>
            <tr>
                <td><label for="">Gender</label></td>
                <td><input type="radio" name="gender" value="male" /> Male
                <input type="radio" name="gender" value="female" /> Female
            </td>
            </tr>
            <tr>
                <td><label for="">Country</label></td>
                <td>
                    <select name="country" id="">
                        <option value="ind">India</option>
                        <option value="pk">Pakistan</option>
                        <option value="ban">Bangladesh</option>
                        <option value="ne">Nepal</option>
                        <option value="sl">Srilanka</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="button" name="submit" id="submit" class="btn bnt-info" value="Submit" /></td>
        </table>
      </form>
      <div id="response"></div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
<script>
   $(document).ready(function(){
     $("#submit").click(function(){
        var name = $("#fullname").val();
        var age = $("#age").val();
        if(name=="" || age=="" || !$('input:radio[name=gender]').is(':checked')){
            $('#response').fadeIn();
            $('#response').removeClass('success-msg').addClass('error-msg').html('All fields are required');
        } else {
           // $('#response').html($('#submit_form').serialize());
           $.ajax({
            url:"save-data.php",
            type:"POST",
            data: $('#submit_form').serialize(),
            beforesend: function(){
            $('#response').fadeIn();
            $('#response').removeClass('success-msg error-msg').addClass('process-msg').html('Loading response...');
          },
            success:function(data){
                $('#submit_form').trigger("reset");
                $('#response').fadeIn();
            $('#response').removeClass('error-msg').addClass('success-msg').html(data);
            setTimeout(function() {
                $('#response').fadeOut("slow");
            }, 4000);
            }
           })
        }
     })

   });
</script>

</body>
</html>
