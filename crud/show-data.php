<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>PHP with Ajax</h1>
            </td>
        </tr>

        <tr>
            <td id="table-load">
<input type="button" id="button-load" value='Load Button'>
            </td>
        </tr>
<tr>
    <td id="load-data">
        
    </td>
</tr>
    </table>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
       <script>
        $(document).ready(function(){
            $("#button-load").click(function(e){
               $.ajax({
                    url:"load-data.php",
                    type:"POST",
                    success:function(data){
                       $("#load-data").html(data); 
                    }

               });
            });
        })
    </script>
    
</body>
</html>