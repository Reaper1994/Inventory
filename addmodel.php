
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

  <style type="text/css"> .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}</style>

  <script>
      $(document).ready(function () {


  $('form#add_model').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: 'save.php',
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log("success");
                console.log(data);
                $("#result").html(data);
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));



      });
    </script>
</head>
<body>


<div class="container">
  <h2>Add Models</h2>
  <form id="add_model" enctype="multipart/form-data" >

  	<input type="hidden"  name="type" value="modelfrom">

  	 
    <div class="form-group row">

     

		     <div class="col-sm-6 spacing" >
		     	<label for="select1">Manufacturer </label>
		       <select class="form-control" id="select1" name="mf_id">


<?php

   $result=$crud->Check_existing_data('car_master','id,manufacturer',array('del'=> 0));







echo $car->build_manufacturer_dropdown($result);


?>
      
                </select>
		    </div>
  
   
    <div   class="col-sm-6 spacing" >
    	<label   for="manudacturer">Models </label>
    	<input type="text" class="form-control" id="model" placeholder="Model Name" name="model">
    </div>
      </div>


  <!-- COMPONENT START -->
    <div class="form-group">
        <label>Upload Image</label>
     <!--    <div class="input-group"> -->
          
               <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
    <!-- <input type="submit" value="Upload Image" name="submit"> -->
            
            <!-- <input type="text" name="attach" value="" class="form-control" readonly> -->
      <!--   </div> -->
        <img id='img-upload'/>
    </div>

        <div id="result">
    
  </div>

    <button type="submit" id="submit" class = "btn btn-primary pull-left">Submit</button>
<button  onclick="location.href='/Carinventory/viewInventory.php'; return false;" class = "btn  pull-right">Next</button>

  </form>
</div>

</body>
</html>

