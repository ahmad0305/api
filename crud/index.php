<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: arial;
            background: #b2bec3;
            padding: 0;
            margin: 0;
        }
        h1{
            text-align: center;
            margin: 15px;
        }
        #main{
            width: 800px;
            margin: 0 auto;
            background: white;
            font-size: 19px;
        }
        #header{
            background: #f7d794;
        }
        #table-form{
            background: #55efc4;
            padding: 20px 10px;
        }
        #table-data{
            padding: 15px;
            height: 500px;
            vertical-align: top;
        }
        #table-data th{
            background: #74b9ff;
        }
        #table-data tr:nth-child(odd){
            background: #ecf0f1;
        }
        
        #success-message{
            background: #DEF1D8;
            color: green;
            padding: 10px;
            margin: 10px;
            display: none;
            position: absolute;
            right: 15px;
            top: 15px;
        }
        #error-message{
            background: #EFDcDD;
            color: red;
            padding: 10px;
            margin: 10px;
            display: none;
            position: absolute;
            right: 15px;
            top: 15px;
        }
        .delete-btn{
            background: red;
            color: #fff;
            border: 0;
            padding: 4px 10px;
            border-radius: 3px;
            margin-right: 5px;
            cursor: pointer;
        }
        .edite-btn{
            background: green;
            color: #fff;
            border: 0;
            padding: 4px 10px;
            border-radius: 3px;
            margin-right: 5px;
            cursor: pointer;
        }
        #model{
            background: rgba(0, 0, 0, 0.7);
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            display: none;
        }
        #model-form{
         background: #fff;
         width: 40%;
         position: relative;
         top: 20%;
         left: calc(50% - 20%);
         padding: 15px;
         border-radius: 4px;
        }
        #model-form h2{
            margin: 0 0 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #000;
        }
        #close-btn{
            background: red;
            color: white;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            position: absolute;
            top: -15px;
            right: -15px;
            cursor: pointer;
        }
        #search-bar{
  padding: 10px 20px 0;
  float: right;
}
#search-bar label{
  font-size: 16px;
  font-weight: bold;
  display: block;
}
#search-bar input{
  width: 250px;
  height: 25px;
  font-size: 18px;
  letter-spacing: 0.8px;
  padding: 3px 10px;
  border-radius: 4px;
  border: 1px solid #000;
}
#search-bar input:focus{
  outline: 0;
}
    </style>
</head>
<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>Add Records with Ajax</h1>
                <div id="search-bar">
                    <label for="">Search: </label>&nbsp;
                    <input type="text" id="search" autocomplete="off">
                </div>
                
            </td>
        </tr>
        <tr>
            <td id="table-form">
                <form id="addForm">
                First Name : <input type="text" id="fname"> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
               Last Name : <input type="text" id="lname">
               <input type="button" id="save-button" value='Save Data'>
            </form>
            </td>
        </tr>
<tr>
    <td id="table-data">
        
    </td>
</tr>
    </table>
    <div id="error-message"></div>
    <div id="success-message"></div>
    <div id='model'>
       <div id='model-form'>
       
          <h2>Edit Form</h2>
          <table cellpadding="10px" width="100%">
            
          </table>
          <div id="close-btn">X</div>
       </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
      <script>
        $(document).ready(function(){
            function loadTable(){
               $.ajax({
                    url:"load-data.php",
                    type:"POST",
                    success:function(data){
                       $("#table-data").html(data); 
                    }

               });
            }
            loadTable();
            // Insert New Records
            $("#save-button").click(function(e){              
              e.preventDefault();
              var fname = $("#fname").val();
              var lname = $("#lname").val();
              if(fname =='' || lname ==''){
                $("#error-message").html("All Fields Are Required").slideDown();
                $("#success-message").slideUp();
              } else{
                $.ajax({
                    url:"ajax-insert.php",
                    type:"POST",
                    data:{first_name:fname, last_name:lname},
                    success:function(data){
                        if(data == 1){
                        loadTable(); 
                        $("#addForm").trigger("reset");
                        $("#success-message").html("Data Inserted Successfully.").slideDown();
                        $("#error-message").slideUp();                       
                        }else{
                            $("#error-message").html("All Fields Are Required").slideDown();
                            $("#success-message").slideUp();
                        }
                    }

               });
              }              
            }); 

            // Delete Records
            $(document).on("click",".delete-btn", function(){
                if(confirm("Do you want to delete this record;")){
                var studentId= $(this).data("id");
                var element = this;
                $.ajax({
                    url:"ajax-delet.php",
                    type:"post",
                    data:{id:studentId},
                    success: function(data){
                        if(data == 1){
                        loadTable();                        
                        $(element).closest("tr").fadeOut();                                               
                        }else{
                            $("#error-message").html("Can't delete this record.").slideDown();
                            $("#success-message").slideUp();
                        } 
                    }
                })
            }
            }) 
            
            // show model
            $(document).on("click",".edite-btn", function(){
              $("#model").show();
              var studentId= $(this).data("eid");
              $.ajax({
                  url:"load-update-form.php",
                 type:"post",
                 data:{id:studentId},
                 success:function(data){
                  $("#model-form table").html(data);
                 }

              });
            });

            // hide model
            $("#close-btn").click(function(e){
                $("#model").hide();

            });

            // Update submit
            $(document).on("click","#edit-submit", function(){
            var stuId= $("#edit-id").val();
            var stuFname= $("#edit-fname").val();
            var stuLname= $("#edit-lname").val();
            $.ajax({
                    url:"update-form.php",
                    type:"POST",
                    data:{id:stuId,first_name:stuFname, last_name:stuLname},
                    success:function(data){
                        if(data == 1){
                            $("#model").hide();
                        loadTable();                        
                        }
                    }
                });
            });

            // Live Search
            $("#search").on("keyup",function(){
       var search_term = $(this).val();

       $.ajax({
         url: "ajax-live-search.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data").html(data);
         }
       });
     });
        })
    </script>
    
</body>
</html>