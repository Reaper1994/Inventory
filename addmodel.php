
<?php 
require_once(dirname(dirname(__FILE__)).'\Carinventory\configuration.php');
require_once(dirname(dirname(__FILE__)).'\Carinventory\BrandClass.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Manufacturer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
      $(document).ready(function () {

 

        $('form#add_model').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'save.php',
            data: $('form#add_model').serialize(),
            success: function (response) {
              console.log('add_manufacturer request sent');
              $("#result").html(response);
            }
          })

        });

      });
    </script>
</head>
<body>


<div class="container">
  <h2>Add Models</h2>
  <form id="add_model" >

  	<input type="hidden"  name="type" value="modelfrom">

  	 
    <div class="form-group row">

     

		     <div class="col-sm-6 spacing" >
		     	<label for="select1">Manufacturer </label>
		       <select class="form-control" id="select1" name="mf_id">


<?php

$query = "SELECT id,manufacturer FROM car_master ORDER BY id ASC";
$result = $crud->getData($query);
 $html="<option ></option>";
foreach ($result as $key => $res) {
  
    $html.="<option value=".$res['id'].">".$res['manufacturer']."</option>";
  }
echo $html;
?>
      
                </select>
		    </div>
  
   
    <div   class="col-sm-6 spacing" >
    	<label   for="manudacturer">Models </label>
    	<input type="text" class="form-control" id="model" placeholder="Model Name" name="model">
    </div>
      </div>

        <div id="result">
    
  </div>

    <button type="submit" id="submit" class = "btn btn-primary pull-left">Submit</button>
<button  onclick="location.href='/Carinventory/viewInventory.php'; return false;" class = "btn  pull-right">Next</button>

  </form>
</div>

</body>
</html>

