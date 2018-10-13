<?php
require_once(dirname(dirname(__FILE__)).'\Carinventory\configuration.php');
require_once(dirname(dirname(__FILE__)).'\Carinventory\BrandClass.php');
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Inventory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
     

               $(document).ready(function(){
              $.ajax({ url: "/Carinventory/lister.php",
                      //context: document.body,
                      success: function(response){
                          $("#lister").html(response);
                      }});





              },   $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("value");   
           $.ajax({ url: "/Carinventory/lister.php?id="+button_id,
                success: function(response){
                          $("#lister").html(response);
                      }});
      }));




              

    


  </script>
</head>
<body>

<div class="container">

  <div class="row">
      <div class="col-sm-12">
         <h2>View Inventory</h2>
   <form action="lister.php">
    
     <input type="hidden"  name="action" value="viewform">
        <div id="lister" >



        </div>


  </form>
      </div>
      <button  onclick="location.href='/Carinventory/addmanufacturer.php';return false;" class = "btn btn-default  success">Add Manufacturer</button>
       <button  onclick="location.href='/Carinventory/addmodel.php';return false;" class = "btn btn-default primary">Add Model</button>
  </div>
</div>

</body>
</html>
